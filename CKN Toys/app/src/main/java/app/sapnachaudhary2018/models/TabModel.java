package app.sapnachaudhary2018.models;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

/**
 * Created by pashvinkumar on 04-06-2018.
 */

public class TabModel {
    public static List<String> tabnameList = Arrays.asList(
            "Latest","Playlists");
    public static List<String> idRegardingyoutubeList = Arrays.asList("UCfaZw8XH_zmAVkBst_MPD6w",
            "PLaFtxW0stqq2h_HS1lmcn0BWzcT_bXcV8,PLaFtxW0stqq3_lGzv2goq4nt9egisUarN,PLaFtxW0stqq06OOpzgQEwC2xYU2gvGYFS," +
                    "PLaFtxW0stqq3d-k-zG7SXDmXmmq7xtiJ8,PLaFtxW0stqq3cU9dCeHGC-Tl5rMzevbd8," +
                    "PLaFtxW0stqq2uNZOyplqINWYL7p08Y-DN,PLaFtxW0stqq3l3hxkmsye5043Lwg4i16e," +
                    "PLaFtxW0stqq1YA2izzIUdK7ATZiz3NVnj,PLaFtxW0stqq3p7oZ0yG6UJC1YRwZFMapj,PLaFtxW0stqq0VSC-fsak1wYeM8h3_FOWI");
    public static List<String> playlistOrChannelList = Arrays.asList("channel","playlistSplash");

    // channel playlist playlistSplash

    public static ArrayList<String> ptabnameList = new ArrayList<String>();
    public static ArrayList<String> pidRegardingyoutubeList = new ArrayList<String>();
    public static ArrayList<String> pplaylistOrChannelList = new ArrayList<String>();


    String tabName;
    String idRegardingYoutube;
    String playStringOrChannel;

    public TabModel(String tabName) {
        this.tabName = tabName;
    }

    public TabModel(String tabName, String idRegardingYoutube, String playStringOrChannel) {
        this.tabName = tabName;
        this.idRegardingYoutube = idRegardingYoutube;
        this.playStringOrChannel = playStringOrChannel;
    }

    public String getTabName() {
        return tabName;
    }

    public void setTabName(String tabName) {
        this.tabName = tabName;
    }

    public String getIdRegardingYoutube() {
        return idRegardingYoutube;
    }

    public void setIdRegardingYoutube(String idRegardingYoutube) {
        this.idRegardingYoutube = idRegardingYoutube;
    }

    public String getPlayStringOrChannel() {
        return playStringOrChannel;
    }

    public void setPlayStringOrChannel(String playStringOrChannel) {
        this.playStringOrChannel = playStringOrChannel;
    }
}
