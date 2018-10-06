package com.techyappdevelopers.videostatus.ui.fragement;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;

import com.peekandpop.shalskar.peekandpop.PeekAndPop;
import com.techyappdevelopers.videostatus.R;
import com.techyappdevelopers.videostatus.adapter.VideoAdapter;
import com.techyappdevelopers.videostatus.api.apiClient;
import com.techyappdevelopers.videostatus.api.apiRest;
import com.techyappdevelopers.videostatus.entity.Video;
import com.techyappdevelopers.videostatus.manager.PrefManager;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;


public class UserFragment extends Fragment {
    private RelativeLayout relative_layout_load_more;
    private Button button_try_again;
    private SwipeRefreshLayout swipe_refreshl_search_fragment;
    private LinearLayout linear_layout_page_error;
    private LinearLayout linear_layout_load_search_fragment;
    private RecyclerView recycler_view_search_fragment;
    private LinearLayoutManager linearLayoutManager;



    private List<Video> VideoList =new ArrayList<Video>();



    private VideoAdapter videoAdapter;

    private View view;

    private Integer page = 0;
    private Boolean loaded=false;

    private Integer user;
    private String type;
    private PrefManager prefManager;
    private String language;
    private int pastVisiblesItems, visibleItemCount, totalItemCount;
    private boolean loading = true;
    private PeekAndPop peekAndPop;
    private int me;

    public UserFragment() {
        // Required empty public constructor
    }
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        this.prefManager= new PrefManager(getActivity().getApplicationContext());

        user = getArguments().getInt("user");
        type = getArguments().getString("type");
        try{
            me = Integer.parseInt(prefManager.getString("ID_USER"));

        }catch (Exception e){
            me=-1;
        }


        this.language=prefManager.getString("LANGUAGE_DEFAULT");

        view= inflater.inflate(R.layout.fragment_user, container, false);

        iniView(view);
        initAction();


        getStatus();

        return view;
    }


    private void getStatus() {


        Retrofit retrofit = apiClient.getClient();
        apiRest service = retrofit.create(apiRest.class);
        Call<List<Video>> call;
        if (user == me){
            call = service.meImage(page,user);
        }else{
            call= service.userImage("created",language,user,page);
        }
        swipe_refreshl_search_fragment.setRefreshing(true);

        call.enqueue(new Callback<List<Video>>() {
            @Override
            public void onResponse(Call<List<Video>> call, Response<List<Video>> response) {
                if(response.isSuccessful()){
                    if (response.body().size()!=0){
                        for (int i=0;i<response.body().size();i++){
                            VideoList.add(response.body().get(i));
                        }
                        videoAdapter.notifyDataSetChanged();
                        page++;
                        loading=true;
                    }else {

                    }
                    recycler_view_search_fragment.setVisibility(View.VISIBLE);
                    linear_layout_load_search_fragment.setVisibility(View.GONE);
                    linear_layout_page_error.setVisibility(View.GONE);

                }else{
                    recycler_view_search_fragment.setVisibility(View.GONE);
                    linear_layout_load_search_fragment.setVisibility(View.GONE);
                    linear_layout_page_error.setVisibility(View.VISIBLE);
                }
                swipe_refreshl_search_fragment.setRefreshing(false);

            }
            @Override
            public void onFailure(Call<List<Video>> call, Throwable t) {
                recycler_view_search_fragment.setVisibility(View.GONE);
                linear_layout_load_search_fragment.setVisibility(View.GONE);
                linear_layout_page_error.setVisibility(View.VISIBLE);
                swipe_refreshl_search_fragment.setRefreshing(false);

            }
        });
    }


    private void getStatusNext() {

        linear_layout_load_search_fragment.setVisibility(View.VISIBLE);
        Retrofit retrofit = apiClient.getClient();
        apiRest service = retrofit.create(apiRest.class);
        Call<List<Video>> call;
        if (user == me){
            call = service.meImage(page,user);
        }else{
            call= service.userImage("created",language,user,page);
        }

        call.enqueue(new Callback<List<Video>>() {
            @Override
            public void onResponse(Call<List<Video>> call, Response<List<Video>> response) {
                if(response.isSuccessful()){
                    if (response.body().size()!=0){
                        for (int i=0;i<response.body().size();i++){
                            VideoList.add(response.body().get(i));
                        }
                        videoAdapter.notifyDataSetChanged();
                        page++;
                        loading=true;

                    }
                    linear_layout_load_search_fragment.setVisibility(View.GONE);
                }

            }
            @Override
            public void onFailure(Call<List<Video>> call, Throwable t) {
                linear_layout_load_search_fragment.setVisibility(View.GONE);

            }
        });
    }


    public void iniView(View  view){



        this.relative_layout_load_more=(RelativeLayout) view.findViewById(R.id.relative_layout_load_more);
        this.button_try_again =(Button) view.findViewById(R.id.button_try_again);
        this.swipe_refreshl_search_fragment=(SwipeRefreshLayout) view.findViewById(R.id.swipe_refreshl_search_fragment);
        this.linear_layout_page_error=(LinearLayout) view.findViewById(R.id.linear_layout_page_error);
        this.linear_layout_load_search_fragment=(LinearLayout) view.findViewById(R.id.linear_layout_load_search_fragment);
        this.recycler_view_search_fragment=(RecyclerView) view.findViewById(R.id.recycler_view_search_fragment);
        this.linearLayoutManager=  new LinearLayoutManager(getActivity(), LinearLayoutManager.VERTICAL, false);
        this.peekAndPop = new PeekAndPop.Builder(getActivity())
                .parentViewGroupToDisallowTouchEvents(recycler_view_search_fragment)
                .peekLayout(R.layout.dialog_view)
                .build();
        videoAdapter =new VideoAdapter(VideoList,null,getActivity(),peekAndPop,true);
        recycler_view_search_fragment.setHasFixedSize(true);
        recycler_view_search_fragment.setAdapter(videoAdapter);
        recycler_view_search_fragment.setLayoutManager(linearLayoutManager);

        recycler_view_search_fragment.setVisibility(View.GONE);
        linear_layout_load_search_fragment.setVisibility(View.VISIBLE);
        linear_layout_page_error.setVisibility(View.GONE);
        swipe_refreshl_search_fragment.setRefreshing(true);
    }

    public void initAction(){
        this.swipe_refreshl_search_fragment.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {

                        VideoList.clear();
                        page = 0;
                        loading=true;
                        getStatus();

            }
        });
        this.button_try_again.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                        getStatus();

            }
        });
        recycler_view_search_fragment.addOnScrollListener(new RecyclerView.OnScrollListener()
        {
            @Override
            public void onScrolled(RecyclerView recyclerView, int dx, int dy)
            {
                if(dy > 0) //check for scroll down
                {

                    visibleItemCount    = linearLayoutManager.getChildCount();
                    totalItemCount      = linearLayoutManager.getItemCount();
                    pastVisiblesItems   = linearLayoutManager.findFirstVisibleItemPosition();

                    if (loading)
                    {
                        if ( (visibleItemCount + pastVisiblesItems) >= totalItemCount)
                        {
                            loading = false;
                            getStatusNext();

                        }
                    }
                }else{

                }
            }
        });
    }


}
