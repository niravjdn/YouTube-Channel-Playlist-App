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
    public static List<String> idRegardingyoutubeList = Arrays.asList("UCbt4SegZBQLeXMTMvnrfZtw",
            "PLQamLLzUTEJwEpJfLxCf_C-aU_viadYWP,PLQamLLzUTEJxGsCUh221-tTcqgElaz8XF,PLQamLLzUTEJxo3arQ8lmq30TBnLDRknEP,PLQamLLzUTEJy1jEhH0m84AjmyGLcHG80d,PLQamLLzUTEJzjBp4LHaQP2KsDdzy-x_0e,PLQamLLzUTEJxCvrxzbKyWDZBaNIE-Fg15,PLQamLLzUTEJw75fFFKC9ak5tBBEkrryGZ,PLQamLLzUTEJyGlYkWcM2ISK3jb4hSi-Br,PLQamLLzUTEJx_1Ts_yornGJX5lwTIIvOf,PLQamLLzUTEJwrh8fvuQfgmRMKGj58tM2a,PLQamLLzUTEJxkDfSaISPREZxzJ3j8aOWB,PLQamLLzUTEJzVvhNBvN5-ziPOf1jvJq9D,PLQamLLzUTEJw60PDtUwEXdFcrTWtPsAMP,PLQamLLzUTEJwyHniCMRmkRHR2ZIKhMdUN,PLQamLLzUTEJx5BX9twxmEG5agqf9i6dSX,PLQamLLzUTEJyBm4JeovfQ9Yf95YjkZ6XV,PLQamLLzUTEJw8RGCGPZGJMECxzvU6BXlh,PLQamLLzUTEJy13SPwQIywYfmgvxCOOd6j,PLQamLLzUTEJz2O0CaZKnouMbuM4wV8Sdi,PLQamLLzUTEJyRjhzwZXfT2G0-Y90wEDMx,PLQamLLzUTEJyh9hHCotFH0S87nsa8ASX3,PLQamLLzUTEJwnGxndMqSHLIFFKwxECUzM,PLQamLLzUTEJz1AWhWNWz5yTZijG0pq9Bv,PLQamLLzUTEJys6afnAR656xq0_cCKndpL,PLQamLLzUTEJyPngrErI04zx6YZxkpz7KK,PLQamLLzUTEJwynFcdFTiPTk2WSN83k9py,PLQamLLzUTEJzgV3AZfDbycWMEp61TXQ8D");
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
