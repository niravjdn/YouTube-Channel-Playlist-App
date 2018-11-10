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
    public static List<String> idRegardingyoutubeList = Arrays.asList("UCY30JRSgfhYXA6i6xX1erWg",
            "PLA02DB6C66045CDF1,PL8A3B1C53A51D29A8,PLShD8ZZW7qjnKyDrH_9YhAf9qv8sUgh1Y,PL0929612B0EB32178,PLShD8ZZW7qjmAAd3194x2abrFBIm_7Fto," +
            "PL2C924BB1F9863B0A," +
            "PLShD8ZZW7qjmr-4yP8PpmnMhIjYv163fB,PLShD8ZZW7qjlcuTyynP5CqrWujfto632g,PLShD8ZZW7qjmX6JAVhEQZAyFZGD9hbkmY,PL21A272CC1406CF4A," +
            "PLShD8ZZW7qjljYNY6mrjzUEH7JzcVSLFy,PLShD8ZZW7qjndObYID9FGeIWYDn1FpU64,PLShD8ZZW7qjljlZ-36_rqcWUNKDnbTMRS," +
            "PLShD8ZZW7qjnptD0SdrkQ_yv6AEXikEdR,PLShD8ZZW7qjnMLd_1Koe1sWC5Hw8FSccX,PLShD8ZZW7qjkb8WwwHjc7JXPcqkrfwUwN," +
            "PLShD8ZZW7qjkK8_32k9KHVhQkvgJq51e6,PLShD8ZZW7qjkFmmIb-MHQKo6xsn4YGYWZ,PLShD8ZZW7qjnzIfB93wJsO3TRmE1b41t5," +
            "PLShD8ZZW7qjkWg_Gysnhn7JBM2hMz0h-M,PLShD8ZZW7qjl-YqHRvAYXTCjpck9QHTzG,PLShD8ZZW7qjkCx8xrkLJqwuHKV56kkv3x," +
            "PLShD8ZZW7qjkjjW901qvK0ZBPABPgFMEB,PLShD8ZZW7qjn_E29Zc0srZGufOVDb0pQt,PLShD8ZZW7qjmJ0LgSQz7TwjMc0e3Vf8Kn," +
            "PLShD8ZZW7qjm4_J-8nIttdVGervkNnnTN,PL4569F63F2FF0357B,PLShD8ZZW7qjk62EAEh5AjHDCBKFptYzDS,PLShD8ZZW7qjkgqvrNthqPfKuwAev39NAN," +
            "PLShD8ZZW7qjkZQIV0f3CRHXIntSa0V5JE,PLShD8ZZW7qjmQa-ndhY3EiaUa9WlWtyAJ,PLShD8ZZW7qjnu__14MsaClH0HwNXEBor1," +
            "PLShD8ZZW7qjnnXG0kkuNRgLHCEcdnw3xg,PLShD8ZZW7qjnnXG0kkuNRgLHCEcdnw3xg," +
            "PLShD8ZZW7qjl8LAKQZXnyCP3xzxOo9WHo,PLShD8ZZW7qjl-63KRnDzY3wReU8VbtoHf," +
            "PL475D75813E9C76E5,PLShD8ZZW7qjlOEh3lGruw2lmiPnT1JaLW");
    public static List<String> playlistOrChannelList = Arrays.asList("channel","playlistSplash");


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
