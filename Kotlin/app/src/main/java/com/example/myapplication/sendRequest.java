package com.example.myapplication;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.toolbox.JsonObjectRequest;

import org.json.JSONObject;

public class sendRequest {
    private String url;
    private String token;

    public String getUrl() {
        return url;
    }

    public String getToken() {
        return token;
    }

    public void setUrl(String url) {
        this.url = url;
    }

    public void setToken(String token) {
        this.token = token;
    }

    public sendRequest(String url, String token) {
        this.url = url;
        this.token = token;
    }

    JsonObjectRequest req = new JsonObjectRequest(Request.Method.GET, url,
            null, new Response.Listener<JSONObject>(){
        @Override


    }){
        @Override
        public Map<String, String> getHeaders() throws AuthFailureError {
            HashMap<String, String> headers = new HashMap<String, String>();
            headers.put("Authorization", "2e96e0a4ff05ba86dc8f778ac49a8dc0");
            return headers;
        }
    };
}
