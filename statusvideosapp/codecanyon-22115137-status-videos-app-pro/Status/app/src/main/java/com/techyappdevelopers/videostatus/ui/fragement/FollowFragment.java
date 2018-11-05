package com.techyappdevelopers.videostatus.ui.fragement;


import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;


import com.peekandpop.shalskar.peekandpop.PeekAndPop;
import com.techyappdevelopers.videostatus.R;
import com.techyappdevelopers.videostatus.adapter.VideoAdapter;
import com.techyappdevelopers.videostatus.api.apiClient;
import com.techyappdevelopers.videostatus.api.apiRest;
import com.techyappdevelopers.videostatus.entity.Video;
import com.techyappdevelopers.videostatus.manager.PrefManager;
import com.techyappdevelopers.videostatus.ui.LoginActivity;
import com.techyappdevelopers.videostatus.ui.MainActivity;

import java.util.ArrayList;
import java.util.List;
import java.util.Map;
import java.util.NavigableMap;
import java.util.TreeMap;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;

/**
 * A simple {@link Fragment} subclass.
 */
public class FollowFragment extends Fragment {

    private Integer page = 0;
    private Boolean loaded=false;

    private View view;
    private RelativeLayout relative_layout_follow_fragment;
    private SwipeRefreshLayout swipe_refreshl_follow_fragment;
    private RecyclerView recycle_view_follow_fragment;
    private RelativeLayout relative_layout_load_more;
    private LinearLayout linear_layout_page_error;
    private Button button_try_again;
    private int pastVisiblesItems, visibleItemCount, totalItemCount;
    private boolean loading = true;
    private VideoAdapter videoAdapter;
    private List<Video> VideoList =new ArrayList<>();
    private Button button_login_nav_follow_fragment;
    private LinearLayout linear_layout_follow_fragment_me;
    private Integer id_user;

    private AlertDialog.Builder builderFollowing;

    private AlertDialog.Builder builderFollowers;
    private ProgressDialog loading_progress;
    private LinearLayoutManager linearLayoutManager;
    private PeekAndPop peekAndPop;
    private PrefManager prefManager;
    private String language;
    private ImageView imageView_empty_follow;

    public FollowFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        view=  inflater.inflate(R.layout.fragment_follow, container, false);
        this.prefManager= new PrefManager(getActivity().getApplicationContext());

        this.language=prefManager.getString("LANGUAGE_DEFAULT");
        initView();
        initAction();

        return  view;
    }
    @Override
    public void setUserVisibleHint(boolean isVisibleToUser) {
        super.setUserVisibleHint(isVisibleToUser);

        if (isVisibleToUser){
            if (!loaded) {
                page = 0;
                loading = true;
                VideoList.clear();
                loadStatus();
            }
        }
        else{

        }
    }

    private void initAction() {
        recycle_view_follow_fragment.addOnScrollListener(new RecyclerView.OnScrollListener()
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
        this.swipe_refreshl_follow_fragment.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                page = 0;
                loading = true;
                VideoList.clear();
                loadStatus();
            }
        });
        button_try_again.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                page = 0;
                loading = true;
                VideoList.clear();
                loadStatus();
            }
        });
        this.button_login_nav_follow_fragment.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                ((MainActivity)getActivity()).setFromLogin();
                Intent intent = new Intent(getActivity(),LoginActivity.class);
                startActivity(intent);
            }
        });

    }
    public void initView(){

        this.imageView_empty_follow=(ImageView) view.findViewById(R.id.imageView_empty_follow);
        this.relative_layout_follow_fragment=(RelativeLayout) view.findViewById(R.id.relative_layout_follow_fragment);
        this.swipe_refreshl_follow_fragment=(SwipeRefreshLayout) view.findViewById(R.id.swipe_refreshl_follow_fragment);
        this.recycle_view_follow_fragment=(RecyclerView) view.findViewById(R.id.recycle_view_follow_fragment);
        this.relative_layout_load_more=(RelativeLayout) view.findViewById(R.id.relative_layout_load_more);
        this.linear_layout_follow_fragment_me=(LinearLayout) view.findViewById(R.id.linear_layout_follow_fragment_me);
        this.linear_layout_page_error=(LinearLayout) view.findViewById(R.id.linear_layout_page_error);
        this.button_try_again=(Button) view.findViewById(R.id.button_try_again);
        this.button_login_nav_follow_fragment=(Button) view.findViewById(R.id.button_login_nav_follow_fragment);
        this.linearLayoutManager=  new LinearLayoutManager(getActivity(), LinearLayoutManager.VERTICAL, false);

        this.peekAndPop = new PeekAndPop.Builder(getActivity())
                .parentViewGroupToDisallowTouchEvents(swipe_refreshl_follow_fragment)
                .peekLayout(R.layout.dialog_view)
                .build();
        videoAdapter =new VideoAdapter(VideoList,null,getActivity(),peekAndPop);
        recycle_view_follow_fragment.setHasFixedSize(true);
        recycle_view_follow_fragment.setAdapter(videoAdapter);
        recycle_view_follow_fragment.setLayoutManager(linearLayoutManager);


        recycle_view_follow_fragment.addOnScrollListener(new RecyclerView.OnScrollListener()
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
        PrefManager prf= new PrefManager(getActivity().getApplicationContext());
        if (prf.getString("LOGGED").toString().equals("TRUE")) {
            this.id_user = Integer.parseInt(prf.getString("ID_USER"));
            linear_layout_follow_fragment_me.setVisibility(View.GONE);
            relative_layout_follow_fragment.setVisibility(View.VISIBLE);
        }else{
            linear_layout_follow_fragment_me.setVisibility(View.VISIBLE);
            relative_layout_follow_fragment.setVisibility(View.GONE);
        }
    }
    private void loadNextStatus() {
        relative_layout_load_more.setVisibility(View.VISIBLE);
        Retrofit retrofit = apiClient.getClient();
        apiRest service = retrofit.create(apiRest.class);
        Call<List<Video>> call = service.followImage(page,language,id_user);
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
                }
                relative_layout_load_more.setVisibility(View.GONE);
            }
            @Override
            public void onFailure(Call<List<Video>> call, Throwable t) {
                relative_layout_load_more.setVisibility(View.GONE);
            }
        });
    }
    private void loadStatus() {

        linear_layout_page_error.setVisibility(View.GONE);
        swipe_refreshl_follow_fragment.setRefreshing(true);

        VideoList.add(new Video().setViewType(0));
        videoAdapter.notifyDataSetChanged();

        Retrofit retrofit = apiClient.getClient();
        apiRest service = retrofit.create(apiRest.class);
        Call<List<Video>> call = service.followImage(page,language,id_user);
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
                        loaded=true;
                        recycle_view_follow_fragment.setVisibility(View.VISIBLE);
                        linear_layout_page_error.setVisibility(View.GONE);
                        imageView_empty_follow.setVisibility(View.GONE);
                    }else{
                        recycle_view_follow_fragment.setVisibility(View.GONE);
                        linear_layout_page_error.setVisibility(View.GONE);
                        imageView_empty_follow.setVisibility(View.VISIBLE);
                    }

                }else{
                    recycle_view_follow_fragment.setVisibility(View.GONE);
                    linear_layout_page_error.setVisibility(View.VISIBLE);
                    imageView_empty_follow.setVisibility(View.GONE);

                }
                swipe_refreshl_follow_fragment.setRefreshing(false);
            }
            @Override
            public void onFailure(Call<List<Video>> call, Throwable t) {
                recycle_view_follow_fragment.setVisibility(View.GONE);
                linear_layout_page_error.setVisibility(View.VISIBLE);
                imageView_empty_follow.setVisibility(View.GONE);
                swipe_refreshl_follow_fragment.setRefreshing(false);

            }
        });
    }

    public void Resume() {
        try {
            PrefManager prf= new PrefManager(getActivity().getApplicationContext());

            if (prf.getString("LOGGED").toString().equals("TRUE")){
                relative_layout_follow_fragment.setVisibility(View.VISIBLE);
                linear_layout_follow_fragment_me.setVisibility(View.GONE);


                this.id_user = Integer.parseInt(prf.getString("ID_USER"));

                page = 0;
                loading = true;
                VideoList.clear();

                loadStatus();

            }else{
                relative_layout_follow_fragment.setVisibility(View.GONE);
                linear_layout_follow_fragment_me.setVisibility(View.VISIBLE);
            }
        }catch (java.lang.NullPointerException e){
            startActivity(new Intent(getContext(),MainActivity.class));
            getActivity().finish();
        }
    }


    private static final NavigableMap<Long, String> suffixes = new TreeMap<>();
    static {
        suffixes.put(1_000L, "k");
        suffixes.put(1_000_000L, "M");
        suffixes.put(1_000_000_000L, "G");
        suffixes.put(1_000_000_000_000L, "T");
        suffixes.put(1_000_000_000_000_000L, "P");
        suffixes.put(1_000_000_000_000_000_000L, "E");
    }
    public static String format(long value) {
        //Long.MIN_VALUE == -Long.MIN_VALUE so we need an adjustment here
        if (value == Long.MIN_VALUE) return format(Long.MIN_VALUE + 1);
        if (value < 0) return "-" + format(-value);
        if (value < 1000) return Long.toString(value); //deal with easy case

        Map.Entry<Long, String> e = suffixes.floorEntry(value);
        Long divideBy = e.getKey();
        String suffix = e.getValue();

        long truncated = value / (divideBy / 10); //the number part of the output times 10
        boolean hasDecimal = truncated < 100 && (truncated / 10d) != (truncated / 10);
        return hasDecimal ? (truncated / 10d) + suffix : (truncated / 10) + suffix;
    }

}