package com.ristana.status_video.ui;

import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;

import com.google.android.gms.ads.AdListener;
import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.AdView;
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

public class CategoryActivity extends AppCompatActivity {

    private int id;
    private String title;
    private String image;

    private Integer page = 0;
    private String language = "0";
    private Boolean loaded=false;

    private SwipeRefreshLayout swipe_refreshl_image_category;
    private RecyclerView recycler_view_image_category;
    private List<Video> VideoList =new ArrayList<>();
    private List<Category> categoryList =new ArrayList<>();
    private VideoAdapter videoAdapter;
    private LinearLayoutManager linearLayoutManager;
    private PrefManager prefManager;
    private boolean loading = true;
    private int pastVisiblesItems, visibleItemCount, totalItemCount;
    private RelativeLayout relative_layout_load_more;
    private LinearLayout linear_layout_page_error;
    private Button button_try_again;
    private ImageView imageView_empty_category;
    private PeekAndPop peekAndPop;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        Bundle bundle = getIntent().getExtras() ;
        this.id =  bundle.getInt("id");
        this.title =  bundle.getString("title");
        this.image =  bundle.getString("image");
        this.prefManager= new PrefManager(getApplicationContext());
        this.language=prefManager.getString("LANGUAGE_DEFAULT");

        setContentView(R.layout.activity_category);
        if(getSupportActionBar() != null)
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setTitle(title);
        initView();
        loadStatus();
        showAdsBanner();
        initAction();

    }
    private void showAdsBanner() {
        if (prefManager.getString("SUBSCRIBED").equals("FALSE")) {
            final AdView mAdView = (AdView) findViewById(R.id.adView);
            AdRequest adRequest = new AdRequest.Builder()
                    .build();

            // Start loading the ad in the background.
            mAdView.loadAd(adRequest);

            mAdView.setAdListener(new AdListener() {
                @Override
                public void onAdLoaded() {
                    super.onAdLoaded();
                    mAdView.setVisibility(View.VISIBLE);
                }
            });
        }

    }
    @Override
    public void onBackPressed(){
        super.onBackPressed();
        overridePendingTransition(R.anim.back_enter, R.anim.back_exit);
        return;
    }
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            // Respond to the action bar's Up/Home button
            case android.R.id.home:
                super.onBackPressed();
                overridePendingTransition(R.anim.back_enter, R.anim.back_exit);
                return true;
        }
        return super.onOptionsItemSelected(item);
    }
    public void initView(){
        this.imageView_empty_category=(ImageView) findViewById(R.id.imageView_empty_category);
        this.relative_layout_load_more=(RelativeLayout) findViewById(R.id.relative_layout_load_more);
        this.button_try_again =(Button) findViewById(R.id.button_try_again);
        this.swipe_refreshl_image_category=(SwipeRefreshLayout) findViewById(R.id.swipe_refreshl_image_category);
        this.linear_layout_page_error=(LinearLayout) findViewById(R.id.linear_layout_page_error);
        this.recycler_view_image_category=(RecyclerView) findViewById(R.id.recycler_view_image_category);
        this.linearLayoutManager=  new LinearLayoutManager(this, LinearLayoutManager.VERTICAL, false);

        this.peekAndPop = new PeekAndPop.Builder(this)
                .parentViewGroupToDisallowTouchEvents(recycler_view_image_category)
                .peekLayout(R.layout.dialog_view)
                .build();
        videoAdapter =new VideoAdapter(VideoList,null,this,peekAndPop,true);
        recycler_view_image_category.setHasFixedSize(true);
        recycler_view_image_category.setAdapter(videoAdapter);
        recycler_view_image_category.setLayoutManager(linearLayoutManager);
        recycler_view_image_category.addOnScrollListener(new RecyclerView.OnScrollListener()
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
    public void initAction(){
        swipe_refreshl_image_category.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                VideoList.clear();
                page = 0;
                loading=true;
                loadStatus();
            }
        });
    }
    public void loadNextStatus(){
        relative_layout_load_more.setVisibility(View.VISIBLE);
        Retrofit retrofit = apiClient.getClient();
        apiRest service = retrofit.create(apiRest.class);
        Call<List<Video>> call = service.imageByCategory(page,prefManager.getString("ORDER_DEFAULT_STATUS"),language,id);
        call.enqueue(new Callback<List<Video>>() {
            @Override
            public void onResponse(Call<List<Video>> call, Response<List<Video>> response) {
                apiClient.FormatData(CategoryActivity.this,response);

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
    public void loadStatus(){
        swipe_refreshl_image_category.setRefreshing(true);
        imageView_empty_category.setVisibility(View.GONE);
        recycler_view_image_category.setVisibility(View.GONE);
        linear_layout_page_error.setVisibility(View.GONE);
        Retrofit retrofit = apiClient.getClient();
        apiRest service = retrofit.create(apiRest.class);
        Call<List<Video>> call = service.imageByCategory(page,prefManager.getString("ORDER_DEFAULT_STATUS"),language,id);
        call.enqueue(new Callback<List<Video>>() {
            @Override
            public void onResponse(Call<List<Video>> call, Response<List<Video>> response) {
                swipe_refreshl_image_category.setRefreshing(false);
                apiClient.FormatData(CategoryActivity.this,response);

                if(response.isSuccessful()){
                    if (response.body().size()!=0){
                        VideoList.clear();
                        for (int i=0;i<response.body().size();i++){
                            VideoList.add(response.body().get(i));
                        }
                        videoAdapter.notifyDataSetChanged();
                        page++;
                        loaded=true;
                        imageView_empty_category.setVisibility(View.GONE);
                        recycler_view_image_category.setVisibility(View.VISIBLE);
                        linear_layout_page_error.setVisibility(View.GONE);
                    }else {
                        imageView_empty_category.setVisibility(View.VISIBLE);
                        recycler_view_image_category.setVisibility(View.GONE);
                        linear_layout_page_error.setVisibility(View.GONE);
                    }


                }else{
                    imageView_empty_category.setVisibility(View.GONE);
                    recycler_view_image_category.setVisibility(View.GONE);
                    linear_layout_page_error.setVisibility(View.VISIBLE);
                }
            }
            @Override
            public void onFailure(Call<List<Video>> call, Throwable t) {
                imageView_empty_category.setVisibility(View.GONE);
                recycler_view_image_category.setVisibility(View.GONE);
                linear_layout_page_error.setVisibility(View.VISIBLE);
            }
        });
    }
}
