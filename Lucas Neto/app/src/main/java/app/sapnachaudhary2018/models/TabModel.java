package app.sapnachaudhary2018.models;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

/**
 * Created by pashvinkumar on 04-06-2018.
 */

public class TabModel {
    public static List<String> tabnameList = Arrays.asList(
            "Latest","VÍDEOS DE BRINQUEDOS","VÍDEOS INFANTIS PARA CRIANÇAS",
            "OS AVENTUREIROS","SUPER FOCA","HISTORINHAS EM PORTUGUÊS","AVENTUREIRO AZUL","ESCOLINHA DO LUCCAS",
            "CONTOS DE FADA","HISTÓRIAS INFANTIS","VÍDEOS MAIS ASSISTIDOS","MÚSICAS INFANTIS","DESENHOS ANIMADOS",
            "BRINCADEIRAS DIVERTIDAS INFANTIS","TROLLAGEM","GINCANA DO LUCCAS","VÍDEO COM FIDGET SPINNERS");

    public static List<String> idRegardingyoutubeList = Arrays.asList("UC_gV70G_Y51LTa3qhu8KiEA","PLyvPAJn-CS2S9iY7YoyMugiqh9SrPBmJN","PLyvPAJn-CS2RQsE0UF1oS1_oFbRjqF4wg",
            "PLyvPAJn-CS2TDUPYjm5ngnL1TqVRHhNX9","PLyvPAJn-CS2S8iCaCAI5fI1jeaIaBpGoZ","PLyvPAJn-CS2RZv6B5NfvRErk7O7wxLzVI",
            "PLyvPAJn-CS2TpLWjIyy7aV-Nv-9i7bXYI","PLyvPAJn-CS2TuirU9tNF0N-zBHijN33_s","PLyvPAJn-CS2Sl5CiNqTmi4jf4XHzD7WV2",
            "PLyvPAJn-CS2QmIjUpo7HujeNDK6QkPf-f","PLyvPAJn-CS2Svz7lu8Yw_W-wujcgdM2Q5","PLyvPAJn-CS2Qdoi0Vdqq-rKDyTt2q0zW5",
            "PLyvPAJn-CS2RTiY3yavqwBPN-GteLWwCV","PLyvPAJn-CS2T9fdhVRuzwtg6Al7hEtiae","PLyvPAJn-CS2SFwd5uCJvKwurlggkIjBo8",
            "PLyvPAJn-CS2TYn59JC5iWBEExcW8jCBRv","PLyvPAJn-CS2RnQJnplQlLYq86XI-nkc7R");
    public static List<String> playlistOrChannelList = Arrays.asList("channel","playlist","playlist",
            "playlist","playlist","playlist","playlist","playlist","playlist","playlist","playlist","playlist","playlist",
            "playlist","playlist","playlist","playlist");


    public static List<String> natakTabnameList = Arrays.asList(
            "Sanjay Goradia","Siddharth Randeria","Movies","Other");
    public static List<String> natakIdRegardingyoutubeList = Arrays.asList("UCuB112ZHY1iygcDEHRg6P5Q","PLlT5Mh7LdcLZk2MB6LiUbZ2YbJQbj3mZv","PLP-nGFpz3fa_0O0nN4kMLbZ6V_equSZLN");
    public static List<String> natakPlaylistOrChannelList = Arrays.asList("channel","playlist","playlist");

    public static List<String> speechtabnameList = Arrays.asList(
            "Sanjay Raval","Kaajal Oza Vaidya","Other");
    public static List<String> speechIdRegardingyoutubeList = Arrays.asList("UC8UNjyAx5qAXbGvEsoQvvhA","UCdaBOxXgS01jBOFVG1x4j3w","PL_mlupJ4yJIgo7gDXtsbqjf10vp-y2zUl");
    public static List<String> speechPlaylistOrChannelList = Arrays.asList("channel","channel","playlist");


    public static List<String> bhajanTabnameList = Arrays.asList(
            "Bhajan","Dayro");
    public static List<String> bhajanIdRegardingyoutubeList = Arrays.asList("PL_mlupJ4yJIhyA03VXq_s1bEEgRUxn0nz","PL_mlupJ4yJIjmncM8Gl5K5LZ47-ZxWUZk");
    public static List<String> bhajanPlaylistOrChannelList = Arrays.asList("playlist","playlist");


    public static List<String> garbaTabnameList = Arrays.asList(
            "Kinjal Dave","Geeta Rabari","Jignesh Kaviraj","Other");
    public static List<String> garbaIdRegardingyoutubeList = Arrays.asList("PL_mlupJ4yJIiZNDf8H268PEc9zxR6eYlr","PL_mlupJ4yJIiZCWv8J2O9mxKMSC4Dr49w","PL_mlupJ4yJIijITMwsA0jro_FxXQP38Mw","PL_mlupJ4yJIgsoVG4Sb9SEFiva7NBz70R");
    public static List<String> garbaPlaylistOrChannelList = Arrays.asList("playlist","playlist","playlist","playlist");



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
