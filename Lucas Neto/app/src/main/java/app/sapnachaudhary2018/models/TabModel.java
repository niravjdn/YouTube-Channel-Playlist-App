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

    public static List<String> idRegardingyoutubeList = Arrays.asList("UC_gV70G_Y51LTa3qhu8KiEA",
            "PLyvPAJn-CS2TYn59JC5iWBEExcW8jCBRv,PLyvPAJn-CS2SFwd5uCJvKwurlggkIjBo8,PLyvPAJn-CS2T9fdhVRuzwtg6Al7hEtiae,PLyvPAJn-CS2RTiY3yavqwBPN-GteLWwCV" +
                    ",PLyvPAJn-CS2S9iY7YoyMugiqh9SrPBmJN,PLyvPAJn-CS2Rx1q2G5MZ0Wqm4rnspz4W4,PLyvPAJn-CS2Svz7lu8Yw_W-wujcgdM2Q5,PLyvPAJn-CS2QmIjUpo7HujeNDK6QkPf-f,PLyvPAJn-CS2TpLWjIyy7aV-Nv-9i7bXYI," +
                    "PLyvPAJn-CS2Sl5CiNqTmi4jf4XHzD7WV2,PLyvPAJn-CS2Qdoi0Vdqq-rKDyTt2q0zW5,PLyvPAJn-CS2RZv6B5NfvRErk7O7wxLzVI,PLyvPAJn-CS2TDUPYjm5ngnL1TqVRHhNX9," +
                    "PLyvPAJn-CS2Qobcf8D6l7HKSTzICdXGQI,PLwS_ytwzpCmZXWfI8ezIQ2h_5GGnufbYs,PLyvPAJn-CS2S8iCaCAI5fI1jeaIaBpGoZ");
    public static List<String> playlistOrChannelList = Arrays.asList("channel","playlistSplash");
    //list playlist playlistSplash

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
