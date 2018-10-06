package com.ristana.status_video.ui.fragement;


import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;

import com.peekandpop.shalskar.peekandpop.PeekAndPop;
import com.ristana.status_video.R;
import com.ristana.status_video.adapter.VideoAdapter;
import com.ristana.status_video.api.apiClient;
import com.ristana.status_video.api.apiRest;
import com.ristana.status_video.entity.Category;
import com.ristana.status_video.entity.Video;
import com.ristana.status_video.manager.PrefManager;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;

/**
 * A simple {@link Fragment} subclass.
 */
public class HomeFragment extends Fragment {


    private Integer page = 0;

    private View view;
    private PrefManager prefManager;
    private String language = "0";
    private boolean loaded = false;
    private RelativeLayout relative_layout_load_more;
    private Button button_try_again;
    private SwipeRefreshLayout swipe_refreshl_status_fragment;
    private LinearLayout linear_layout_page_error;
    private LinearLayout linear_layout_load_status_fragment;
    private RecyclerView recycler_view_status_fragment;
    private LinearLayoutManager linearLayoutManager;

    private int pastVisiblesItems, visibleItemCount, totalItemCount;
    private boolean loading = true;

    private List<Video> VideoList =new ArrayList<>();
    private List<Category> categoryList =new ArrayList<>();
    private VideoAdapter videoAdapter;
    private PeekAndPop peekAndPop;


    public HomeFragment() {
        // Required empty public constructor


    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment

        this.view =  inflater.inflate(R.layout.fragment_home, container, false);
        this.prefManager= new PrefManager(getActivity().getApplicationContext());

        this.language=prefManager.getString("LANGUAGE_DEFAULT");

        initView();
        initAction();

        loadData();
        return view;
    }
    @Override
    public void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setHasOptionsMenu(true);

    }
    @Override
    public void onCreateOptionsMenu(Menu menu, MenuInflater inflater) {
        // Do something that differs the Activity's menu here
        super.onCreateOptionsMenu(menu, inflater);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        return false;
    }


    @Override
    public void setUserVisibleHint(boolean isVisibleToUser) {
        super.setUserVisibleHint(isVisibleToUser);


    }
    private void initAction() {
        this.swipe_refreshl_status_fragment.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                page = 0;
                loading = true;
                loadData();
            }
        });
        button_try_again.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                page = 0;
                loading = true;
                loadData();
            }
        });
    }

    private void initView() {
        this.relative_layout_load_more=(RelativeLayout) view.findViewById(R.id.relative_layout_load_more);
        this.button_try_again =(Button) view.findViewById(R.id.button_try_again);
        this.swipe_refreshl_status_fragment=(SwipeRefreshLayout) view.findViewById(R.id.swipe_refreshl_status_fragment);
        this.linear_layout_page_error=(LinearLayout) view.findViewById(R.id.linear_layout_page_error);
        this.linear_layout_load_status_fragment=(LinearLayout) view.findViewById(R.id.linear_layout_load_status_fragment);
        this.recycler_view_status_fragment=(RecyclerView) view.findViewById(R.id.recycler_view_status_fragment);
        this.linearLayoutManager=  new LinearLayoutManager(getActivity(), LinearLayoutManager.VERTICAL, false);
        this.swipe_refreshl_status_fragment.setProgressViewOffset(false,0,300);
        this.peekAndPop = new PeekAndPop.Builder(getActivity())
                .parentViewGroupToDisallowTouchEvents(recycler_view_status_fragment)
                .peekLayout(R.layout.dialog_view)
                .build();
        videoAdapter =new VideoAdapter(VideoList,categoryList,getActivity(),peekAndPop);
        recycler_view_status_fragment.setHasFixedSize(true);
        recycler_view_status_fragment.setAdapter(videoAdapter);
        recycler_view_status_fragment.setLayoutManager(linearLayoutManager);
        recycler_view_status_fragment.addOnScrollListener(new RecyclerView.OnScrollListener()
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
                            loadNextStatus();
                        }
                    }
                }else{

                }
            }
        });
    }
    public void loadData(){
        recycler_view_status_fragment.setVisibility(View.GONE);
        linear_layout_load_status_fragment.setVisibility(View.VISIBLE);
        linear_layout_page_error.setVisibility(View.GONE);
        swipe_refreshl_status_fragment.setRefreshing(true);

        Retrofit retrofit = apiClient.getClient();
        apiRest service = retrofit.create(apiRest.class);
        Call<List<Category>> call = service.categoriesImageAll();
        call.enqueue(new Callback<List<Category>>() {
            @Override
            public void onResponse(Call<List<Category>> call, Response<List<Category>> response) {
                swipe_refreshl_status_fragment.setRefreshing(false);
                if(response.isSuccessful()){
                    if (response.body().size()!=0){
                        categoryList.clear();
                        for (int i=0;i<response.body().size();i++){
                            if (i<10){
                                categoryList.add(response.body().get(i));
                            }else {
                                categoryList.add(null);
                                break;
                            }
                        }
                        videoAdapter.notifyDataSetChanged();
                    }else {

                    }

                    loadStatus();
                }else{
                    recycler_view_status_fragment.setVisibility(View.GONE);
                    linear_layout_load_status_fragment.setVisibility(View.GONE);
                    linear_layout_page_error.setVisibility(View.VISIBLE);

                }
            }
            @Override
            public void onFailure(Call<List<Category>> call, Throwable t) {
                recycler_view_status_fragment.setVisibility(View.GONE);
                linear_layout_load_status_fragment.setVisibility(View.GONE);
                linear_layout_page_error.setVisibility(View.VISIBLE);
                swipe_refreshl_status_fragment.setRefreshing(false);


            }
        });
    }
    public void loadStatus(){
        swipe_refreshl_status_fragment.setRefreshing(true);
        Retrofit retrofit = apiClient.getClient();
        apiRest service = retrofit.create(apiRest.class);
        Call<List<Video>> call = service.imageAll(page,"created",language);
        call.enqueue(new Callback<List<Video>>() {
            @Override
            public void onResponse(Call<List<Video>> call, Response<List<Video>> response) {
                apiClient.FormatData(getActivity(),response);
                swipe_refreshl_status_fragment.setRefreshing(false);
                VideoList.clear();
                VideoList.add(new Video().setViewType(0));
                VideoList.add(new Video().setViewType(1));
                if(response.isSuccessful()){
                    if (response.body().size()!=0){
                        for (int i=0;i<response.body().size();i++){
                            VideoList.add(response.body().get(i));
                        }
                        videoAdapter.notifyDataSetChanged();
                        page++;
                        loaded=true;
                    }else {

                    }
                    recycler_view_status_fragment.setVisibility(View.VISIBLE);
                    linear_layout_load_status_fragment.setVisibility(View.GONE);
                    linear_layout_page_error.setVisibility(View.GONE);

                }else{
                    recycler_view_status_fragment.setVisibility(View.GONE);
                    linear_layout_load_status_fragment.setVisibility(View.GONE);
                    linear_layout_page_error.setVisibility(View.VISIBLE);
                }
            }
            @Override
            public void onFailure(Call<List<Video>> call, Throwable t) {
                recycler_view_status_fragment.setVisibility(View.GONE);
                linear_layout_load_status_fragment.setVisibility(View.GONE);
                linear_layout_page_error.setVisibility(View.VISIBLE);
                swipe_refreshl_status_fragment.setRefreshing(false);

            }
        });
    }
    public void loadNextStatus(){
        relative_layout_load_more.setVisibility(View.VISIBLE);
        Retrofit retrofit = apiClient.getClient();
        apiRest service = retrofit.create(apiRest.class);
        Call<List<Video>> call = service.imageAll(page,"created",language);
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
                    relative_layout_load_more.setVisibility(View.GONE);
                }
            }
            @Override
            public void onFailure(Call<List<Video>> call, Throwable t) {
                relative_layout_load_more.setVisibility(View.GONE);
            }
        });
    }
}
