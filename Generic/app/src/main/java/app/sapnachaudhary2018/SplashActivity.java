package app.sapnachaudhary2018;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;

import app.sapnachaudhary2018.R;

import static android.support.v7.app.AlertDialog.*;

/**
 * Created by pashvinkumar on 30-05-2018.
 */

public class SplashActivity extends AppCompatActivity {

    private  int SPLASH_TIME = 1000;
    @Override
    public void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.splash_activity);
        new BackgroundTask().execute();
       /* Intent intent = new Intent(this, MainActivity.class);
        startActivity(intent);
        finish();*/
    }

    private class BackgroundTask extends AsyncTask {
        Intent intent;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();

            intent = new Intent(SplashActivity.this, MainActivity.class);
        }

        @Override
        protected Object doInBackground(Object[] params) {

            /*  Use this method to load background
            * data that your app needs. */




            try {
                Thread.sleep(SPLASH_TIME);

            } catch (InterruptedException e) {
                e.printStackTrace();
            }

            return null;
        }

        @Override
        protected void onPostExecute(Object o) {
            super.onPostExecute(o);
//            Pass your loaded data here using Intent

//            intent.putExtra("data_key", "");
            if(!isConnected(SplashActivity.this)) buildDialog(SplashActivity.this).show();
            else {
                startActivity(intent);
                finish();
            }
        }

        public boolean isConnected(Context context) {

            ConnectivityManager cm = (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
            NetworkInfo netinfo = cm.getActiveNetworkInfo();

            if (netinfo != null &&  netinfo.isConnectedOrConnecting()) {
                android.net.NetworkInfo wifi = cm.getNetworkInfo(ConnectivityManager.TYPE_WIFI);
                android.net.NetworkInfo mobile = cm.getNetworkInfo(ConnectivityManager.TYPE_MOBILE);

                if((mobile != null && mobile.isConnectedOrConnecting()) || (wifi != null && wifi.isConnectedOrConnecting())) return true;
                else return false;
            } else
                return false;
        }

        public Builder buildDialog(Context c) {

            Builder builder = new Builder(c);
            builder.setTitle("No Internet Connection");
            builder.setMessage("You need to have Mobile Data or Wi-Fi to access this app.");

            builder.setPositiveButton("Try Again", new DialogInterface.OnClickListener() {

                @Override
                public void onClick(DialogInterface dialog, int which) {
                    //open app again
                    Intent intent = new Intent(
                            SplashActivity.this,
                            SplashActivity.class);
                    finish();
                    startActivity(intent);

                }
            });

            builder.setNegativeButton("Exit",new DialogInterface.OnClickListener() {

                @Override
                public void onClick(DialogInterface dialog, int which) {

                    finish();
                }
            });
            return builder;
        }
    }
}

