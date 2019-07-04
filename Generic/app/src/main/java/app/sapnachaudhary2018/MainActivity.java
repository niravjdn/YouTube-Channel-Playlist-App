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

import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.AdView;
import com.google.android.gms.ads.MobileAds;

import app.sapnachaudhary2018.models.TabModel;


public class MainActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    private TabLayout tabLayout = null;
    private ViewPager viewPager = null;
    private String packageName;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        packageName = getPackageName();
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        MobileAds.initialize(this, getString(R.string.app_ad_id));


        AdView adView = (AdView) findViewById(R.id.adView);
        AdRequest adRequest = new AdRequest.Builder().addTestDevice(getString(R.string.testdevice))
                .build();
        adView.loadAd(adRequest);

        tabLayout = (TabLayout) findViewById(R.id.tab_layout);
        viewPager = (ViewPager) findViewById(R.id.viewPager);

       /* TabModel m = new TabModel("demo","dafEMk2A6QKz1mrk1uIGfHkC1zZ6UU","playlist");
        TabModel.tabnameList.add(m.getTabName());
        TabModel.idRegardingyoutubeList.add(m.getIdRegardingYoutube());
        TabModel.playlistOrChannelList.add(m.getPlayStringOrChannel());*/

       for(int i = 0; i< TabModel.idRegardingyoutubeList.size(); i++){
           Log.d("App: sizeoflist",TabModel.idRegardingyoutubeList.size()+"");
           tabLayout.addTab(tabLayout.newTab().setText(TabModel.tabnameList.get(i)));
       }


        //setting the tabs title
        //tabLayout.addTab(tabLayout.newTab().setText("2017"));
        //tabLayout.addTab(tabLayout.newTab().setText("Public Dance"));

        tabLayout.addTab(tabLayout.newTab().setText("Favourite"));
        //setup the view pager
        final PagerAdapter adapter = new app.sapnachaudhary2018.adapters.PagerAdapter(getSupportFragmentManager(),tabLayout.getTabCount());
        viewPager.setAdapter(adapter);
        viewPager.addOnPageChangeListener(new TabLayout.TabLayoutOnPageChangeListener(tabLayout));

        //Bitmap originalBitmap = BitmapFactory.decodeResource(getResources(), R.drawable.background);
        //Bitmap blurredBitmap = BlurBuilder.blur( this, originalBitmap );
        //viewPager.setBackgroundResource(R.drawable.background);



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




        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            new AlertDialog.Builder(this)
                    //.setIcon(android.R.drawable.ic_dialog_alert)
                   // .setTitle("Closing Activity")
                    .setMessage("Are you sure you want to exit?")
                    .setPositiveButton("Yes", new DialogInterface.OnClickListener()
                    {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            finish();
                        }

                    })
                    .setNegativeButton("No", null)
                    .show();

        }
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

        //noinspection SimplifiableIfStatement
       /* if (id == R.id.action_settings) {
            return true;
        }*/

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_home) {
            // Handle the home action
            Intent i = new Intent(MainActivity.this, MainActivity.class);
            startActivity(i);
        } else if (id == R.id.nav_gallery) {

        } else if (id == R.id.nav_slideshow) {

        }else if (id == R.id.nav_manage) {

        }else if(id == R.id.nav_disclamer){
            AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(
                    MainActivity.this);

            // set title
            alertDialogBuilder.setTitle("Disclaimer");

            // set dialog message
            alertDialogBuilder
                    .setMessage("The content provided in this app is hosted by YouTube and is available in " +
                            "public domain. We do not upload any videos to YouTube and don't even show any modified content. " +
                            "This app only enables to watch related and popular video songs in an easy manner.")
                    .setCancelable(false)
                    .setPositiveButton("OK",new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog,int id) {

                            //do whatever you want to do when user clicks ok

                        }
                    });
            alertDialogBuilder.show();

        }
        else if (id == R.id.nav_rate) {
            Log.d("App: packageName",packageName+"");
            Uri uri = Uri.parse("market://details?id=" + packageName);
            Intent goToMarket = new Intent(Intent.ACTION_VIEW, uri);
            // To count with Play market backstack, After pressing back button,
            // to taken back to our application, we need to add following flags to intent.
            goToMarket.addFlags(Intent.FLAG_ACTIVITY_NO_HISTORY |
                    Intent.FLAG_ACTIVITY_NEW_DOCUMENT |
                    Intent.FLAG_ACTIVITY_MULTIPLE_TASK);
            try {
                startActivity(goToMarket);
            } catch (ActivityNotFoundException e) {
                startActivity(new Intent(Intent.ACTION_VIEW,
                        Uri.parse("http://play.google.com/store/apps/details?id=" + packageName)));
            }

        }else if (id == R.id.nav_share) {

            try {
                Intent i = new Intent(Intent.ACTION_SEND);
                i.setType("text/plain");
                i.putExtra(Intent.EXTRA_SUBJECT, R.string.app_name);
                String sAux = getString(R.string.app_name)+"is amazing.\n\nLet me recommend you this application\n\n";
                sAux = sAux + "https://play.google.com/store/apps/details?id="+packageName+" \n\n";
                i.putExtra(Intent.EXTRA_TEXT, sAux);
                startActivity(Intent.createChooser(i, "Share"));
            } catch(Exception e) {
                //e.toString();
            }
        } else if (id == R.id.nav_contact_developer) {

            try {
                Intent sendEmail = new Intent(android.content.Intent.ACTION_SEND);

            /* Fill it with Data */
                sendEmail.setType("plain/text");
                sendEmail.putExtra(android.content.Intent.EXTRA_EMAIL, new String[]{getString(R.string.developer_email)});
                sendEmail.putExtra(android.content.Intent.EXTRA_SUBJECT, "Feedback For "+getString(R.string.app_name));
                sendEmail.putExtra(android.content.Intent.EXTRA_TEXT,
                        "Hi Developer, \n");

            /* Send it off to the Activity-Chooser */
                startActivity(Intent.createChooser(sendEmail, "Send mail..."));
            } catch(Exception e) {
                //e.toString();
            }
        }else if (id == R.id.nav_send) {

        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
