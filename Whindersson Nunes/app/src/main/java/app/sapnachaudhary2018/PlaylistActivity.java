package app.sapnachaudhary2018;

import android.content.ActivityNotFoundException;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.design.widget.TabLayout;
import android.support.v4.view.PagerAdapter;
import android.support.v4.view.ViewPager;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;


import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;

import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.AdView;
import com.google.android.gms.ads.MobileAds;

import java.sql.Array;
import java.util.Arrays;

import app.sapnachaudhary2018.models.PlaylistModel;
import app.sapnachaudhary2018.models.TabModel;


public class PlaylistActivity extends AppCompatActivity
       {

    private TabLayout tabLayout = null;
    private ViewPager viewPager = null;
    private String packageName;
    private String pubName;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_playlist);
        packageName = getPackageName();
        pubName = getString(R.string.pubName);

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        MobileAds.initialize(this, getString(R.string.app_ad_id));


        AdView adView = (AdView) findViewById(R.id.adView);
        /*AdRequest adRequest = new AdRequest.Builder().addTestDevice(getString(R.string.testdevice))
                .build();*/
        AdRequest adRequest = new AdRequest.Builder().build();
        adView.loadAd(adRequest);



        PlaylistModel playlistModel = getIntent().getParcelableExtra(PlaylistModel.class.toString());

        TabModel.pidRegardingyoutubeList.clear();
        TabModel.ptabnameList.clear();
        TabModel.pplaylistOrChannelList.clear();

        Log.d("Dekho",playlistModel.getPlaylistID());

        TabModel.pidRegardingyoutubeList.add(playlistModel.getPlaylistID());
        TabModel.ptabnameList.add(playlistModel.getTitle());
        TabModel.pplaylistOrChannelList.add("playlist");

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        setTitle(playlistModel.getTitle());

        tabLayout = (TabLayout) findViewById(R.id.tab_layout);
        viewPager = (ViewPager) findViewById(R.id.viewPager);

        try{
            tabLayout.setVisibility(View.GONE);
        }catch (Exception e){
            Log.d("Exe", Arrays.toString(e.getStackTrace()));
        }


        for(int i = 0; i< TabModel.pidRegardingyoutubeList.size(); i++){
            Log.d("App: sizeoflist",TabModel.pidRegardingyoutubeList.size()+"");
            tabLayout.addTab(tabLayout.newTab().setText(TabModel.ptabnameList.get(i)));
        }


        //setting the tabs title
        //tabLayout.addTab(tabLayout.newTab().setText("2017"));
        //tabLayout.addTab(tabLayout.newTab().setText("Public Dance"));
        //setup the view pager
        final PagerAdapter adapter = new app.sapnachaudhary2018.adapters.PagerAdapterPlaylist(getSupportFragmentManager(),tabLayout.getTabCount());
        viewPager.setAdapter(adapter);
        viewPager.addOnPageChangeListener(new TabLayout.TabLayoutOnPageChangeListener(tabLayout));

        //Bitmap originalBitmap = BitmapFactory.decodeResource(getResources(), R.drawable.background);
        //Bitmap blurredBitmap = BlurBuilder.blur( this, originalBitmap );
        //viewPager.setBackgroundResource(R.drawable.background);

        viewPager.setOffscreenPageLimit(adapter.getCount()-1);

        tabLayout.setOnTabSelectedListener(new TabLayout.OnTabSelectedListener() {
            @Override
            public void onTabSelected(TabLayout.Tab tab) {
                viewPager.setCurrentItem(tab.getPosition());
            }

            @Override
            public void onTabUnselected(TabLayout.Tab tab) {

            }

            @Override
            public void onTabReselected(TabLayout.Tab tab) {

            }
        });

    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
    }

    //Menu

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        // getMenuInflater().inflate(R.menu.main, menu);

        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        if (id==android.R.id.home) {
            finish();
        }

        return super.onOptionsItemSelected(item);
    }

}
