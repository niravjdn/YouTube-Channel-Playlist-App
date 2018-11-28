package app.sapnachaudhary2018.models;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

/**
 * Created by pashvinkumar on 04-06-2018.
 */

public class TabModel {
    public static List<String> tabnameList = new ArrayList<>();

    public static List<String> idRegardingyoutubeList = new ArrayList<>();

    public static List<String> playlistOrChannelList = new ArrayList<>();
    //list playlist playlistSplash


    public static List<String> tabnameList1 = Arrays.asList(
            "Latest","Playlists");

    public static List<String> idRegardingyoutubeList1 = Arrays.asList("UC_gV70G_Y51LTa3qhu8KiEA",
            "PLyvPAJn-CS2TYn59JC5iWBEExcW8jCBRv,PLyvPAJn-CS2SFwd5uCJvKwurlggkIjBo8,PLyvPAJn-CS2T9fdhVRuzwtg6Al7hEtiae,PLyvPAJn-CS2RTiY3yavqwBPN-GteLWwCV" +
                    ",PLyvPAJn-CS2S9iY7YoyMugiqh9SrPBmJN,PLyvPAJn-CS2Rx1q2G5MZ0Wqm4rnspz4W4,PLyvPAJn-CS2Svz7lu8Yw_W-wujcgdM2Q5,PLyvPAJn-CS2QmIjUpo7HujeNDK6QkPf-f,PLyvPAJn-CS2TpLWjIyy7aV-Nv-9i7bXYI," +
                    "PLyvPAJn-CS2Sl5CiNqTmi4jf4XHzD7WV2,PLyvPAJn-CS2Qdoi0Vdqq-rKDyTt2q0zW5,PLyvPAJn-CS2RZv6B5NfvRErk7O7wxLzVI,PLyvPAJn-CS2TDUPYjm5ngnL1TqVRHhNX9," +
                    "PLyvPAJn-CS2Qobcf8D6l7HKSTzICdXGQI,PLwS_ytwzpCmZXWfI8ezIQ2h_5GGnufbYs,PLyvPAJn-CS2S8iCaCAI5fI1jeaIaBpGoZ");
    public static List<String> playlistOrChannelList1 = Arrays.asList("channel","playlistSplash");


    public static List<String> tabnameList2 = Arrays.asList(
            "Latest","Playlists");

    public static List<String> idRegardingyoutubeList2 = Arrays.asList("UCV306eHqgo0LvBf3Mh36AHg",
            "PLnRuoKy8h_HuqRiDbGH_jFjqHLVvXlnCr,PLnRuoKy8h_HuKQP1Ug2F0CUoEjOpvkrer,PLnRuoKy8h_HtCVwXU2dSmtrYuG8fOozmO,PLnRuoKy8h_HuNXazbo1NxzPcgdSMXO8Tf," +
                    "PLnRuoKy8h_HtQu0v-0gWhEdFydzFijY2A,PLnRuoKy8h_HvvyJr2CTp_kTA5wVF4CqWp,PLnRuoKy8h_Hu96ta1KBfbb4OzvOHjwNwe," +
                    "PL08D8E8AF757CB6CF,PLnRuoKy8h_HvkM-990P0YJS8I6qw1Gods,,PLnRuoKy8h_HtbggT7dARGnTk0OTIywXc1,PL75F25C99BA786497," +
                    "FLV306eHqgo0LvBf3Mh36AHg");
    public static List<String> playlistOrChannelList2 = Arrays.asList("channel","playlistSplash");



    public static List<String> tabnameList3 = Arrays.asList(
            "Latest","Playlists");

    public static List<String> idRegardingyoutubeList3 = Arrays.asList("UCIR9VKPE70KJ4DX2zCjHObw",
            "PLcxvXxwYDbF2kk2d3ZcfALQJqubyhXSAf,PLcxvXxwYDbF341EUYNWSZDP83DbkINmRK,PLcxvXxwYDbF31KzD3wSXWKjw7zqW6_GZv," +
                    "PLcxvXxwYDbF12a7vb3Nm0mbvbcabcOdjs,PLcxvXxwYDbF1SEeaaT2q7qDYfpW_PzsYQ,PLcxvXxwYDbF07yP3avVJDmua1Q1Dzq1HP," +
                    "PLcxvXxwYDbF3VJHczpB2xLPXLujPhlElO,PLcxvXxwYDbF2kZI2XVygORYclwqrVrPAC");
    public static List<String> playlistOrChannelList3 = Arrays.asList("channel","playlistSplash");





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
