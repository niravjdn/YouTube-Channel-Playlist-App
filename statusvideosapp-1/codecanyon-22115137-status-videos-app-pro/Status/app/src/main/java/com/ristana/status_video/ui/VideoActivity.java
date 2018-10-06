package com.ristana.status_video.ui;


import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.view.View;
import android.widget.Toast;

import com.google.android.gms.ads.AdListener;
import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.AdView;
import com.ristana.status_video.R;
import com.ristana.status_video.api.apiClient;
import com.ristana.status_video.api.apiRest;
import com.ristana.status_video.entity.Video;
import com.ristana.status_video.manager.PrefManager;
import com.ristana.status_video.ui.fragement.VideoFragment;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;


public class VideoActivity extends AppCompatActivity {

    private int id;
    private int userid;
    private String user;
    private String userimage;
    private String created;
    private boolean comment;
    private int comments  = 0;
    private int font =  1;
    private int copied = 0;
    private String from;
    private String title;
    private String thumbnail;
    private String type;
    private String video;
    private String image;
    private String extension;
    private int downloads;
    private String tags;
    private boolean review;

    private int like;
    private int love;
    private int angry;
    private int haha;
    private int woow;
    private int sad;


    private ViewPager main_view_pager;
    private final List<Fragment> mFragmentList = new ArrayList<>();
    private ViewPagerAdapter adapter;
    private PrefManager prefManager;
    private String language;
    private String local;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_video);

        Bundle bundle = getIntent().getExtras() ;
        this.from =  bundle.getString("from");


        this.id = bundle.getInt("id");
        this.title = bundle.getString("title");
        this.thumbnail = bundle.getString("thumbnail");
        this.userid = bundle.getInt("userid");
        this.user = bundle.getString("user");
        this.userimage = bundle.getString("userimage");
        this.type = bundle.getString("type");
        this.video = bundle.getString("video");
        this.image = bundle.getString("image");
        this.extension = bundle.getString("extension");
        this.comment = bundle.getBoolean("comment");
        this.downloads = bundle.getInt("downloads");
        this.tags = bundle.getString("tags");
        this.review = bundle.getBoolean("review");
        this.comments = bundle.getInt("comments");
        this.created = bundle.getString("created");
        this.local = bundle.getString("local");

        this.woow = bundle.getInt("woow");
        this.like = bundle.getInt("like");
        this.love = bundle.getInt("love");
        this.angry = bundle.getInt("angry");
        this.sad = bundle.getInt("sad");
        this.haha = bundle.getInt("haha");



        this.prefManager= new PrefManager(getApplicationContext());
        this.language=prefManager.getString("LANGUAGE_DEFAULT");

        Toolbar toolbar = (Toolbar)findViewById(R.id.toolbar);
        toolbar.setTitle("");
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        initView();
        loadMore();
        showAdsBanner();

    }

    private void loadMore() {
        Retrofit retrofit = apiClient.getClient();
        apiRest service = retrofit.create(apiRest.class);
        Call<List<Video>> call = service.ImageByRandom(language);
        call.enqueue(new Callback<List<Video>>() {
            @Override
            public void onResponse(Call<List<Video>> call, Response<List<Video>> response) {
                if (response.isSuccessful()){
                    for (int i = 0; i < response.body().size(); i++) {
                        if (id!=response.body().get(i).getId()) {
                            VideoFragment videoFragment = new VideoFragment();
                            Bundle bundle = new Bundle();
                            bundle.putInt("id", response.body().get(i).getId());
                            bundle.putString("title", response.body().get(i).getTitle());
                            bundle.putString("thumbnail", response.body().get(i).getThumbnail());
                            bundle.putInt("userid", response.body().get(i).getUserid());
                            bundle.putString("user", response.body().get(i).getUser());
                            bundle.putString("userimage", response.body().get(i).getUserimage());
                            bundle.putString("type", response.body().get(i).getType());
                            bundle.putString("video", response.body().get(i).getVideo());
                            bundle.putString("image", response.body().get(i).getImage());
                            bundle.putString("extension", response.body().get(i).getExtension());
                            bundle.putBoolean("comment", response.body().get(i).getComment());
                            bundle.putInt("downloads", response.body().get(i).getDownloads());
                            bundle.putString("tags", response.body().get(i).getTags());
                            bundle.putBoolean("review", response.body().get(i).getReview());
                            bundle.putInt("comments", response.body().get(i).getComments());
                            bundle.putString("created", response.body().get(i).getCreated());

                            bundle.putInt("woow", response.body().get(i).getWoow());
                            bundle.putInt("like", response.body().get(i).getLike());
                            bundle.putInt("love", response.body().get(i).getLove());
                            bundle.putInt("angry", response.body().get(i).getAngry());
                            bundle.putInt("sad", response.body().get(i).getSad());
                            bundle.putInt("haha", response.body().get(i).getHaha());
                            bundle.putString("from", "sub" );

                            videoFragment.setArguments(bundle);
                            adapter.addFragment(videoFragment);
                            adapter.notifyDataSetChanged();
                        }
                    }
                }
            }

            @Override
            public void onFailure(Call<List<Video>> call, Throwable t) {

            }
        });
    }

    private void initView() {
        adapter = new ViewPagerAdapter(getSupportFragmentManager());
        this.main_view_pager = (ViewPager) findViewById(R.id.main_view_pager);
        main_view_pager.setOffscreenPageLimit(0);
        main_view_pager.setAdapter(adapter);


      /*  VideoFragment imageFragment =  new VideoFragment();
        Bundle bundle = new Bundle();


        Toast.makeText(this, "from initView"+id, Toast.LENGTH_LONG).show();

        imageFragment.setArguments(bundle);

        adapter.addFragment(imageFragment);*/

        Bundle bundle = new Bundle();
        bundle.putInt("id", id);
        bundle.putString("title",title);
        bundle.putString("thumbnail", thumbnail);
        bundle.putInt("userid", userid);
        bundle.putString("user", user);
        bundle.putString("userimage", userimage);
        bundle.putString("type",type);
        bundle.putString("video", video);
        bundle.putString("image", image);
        bundle.putString("extension", extension);
        bundle.putBoolean("comment",comment);
        bundle.putInt("downloads",downloads);
        bundle.putString("tags", tags);
        bundle.putBoolean("review",review);
        bundle.putInt("comments",comments);
        bundle.putString("created",created);
        bundle.putString("local",local);

        bundle.putInt("woow", woow);
        bundle.putInt("like", like);
        bundle.putInt("love", love);
        bundle.putInt("angry",angry);
        bundle.putInt("sad", sad);
        bundle.putInt("haha", haha);


        VideoFragment fragobj = new VideoFragment();
        fragobj.setArguments(bundle);
        adapter.addFragment(fragobj);

        adapter.notifyDataSetChanged();
    }
    class ViewPagerAdapter extends FragmentPagerAdapter {

        public ViewPagerAdapter(FragmentManager manager) {
            super(manager);
        }

        @Override
        public Fragment getItem(int position) {

            return mFragmentList.get(position);

        }
        @Override
        public int getCount() {
            return mFragmentList.size();
        }
        public void addFragment(Fragment fragment) {
            mFragmentList.add(fragment);

        }

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
}
