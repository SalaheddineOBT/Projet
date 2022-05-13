package com.example.myapplication;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;

import org.json.JSONObject;

import java.util.Map;

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
            null, new Response.Listener<JSONObject>() {
        @Override
        public void onResponse(JSONObject response) {

        }
    }, new Response.ErrorListener() {
        @Override
        public void onErrorResponse(VolleyError error) {

        }
    }){
        @Override
        public Map<String, String> getHeaders() throws AuthFailureError {
            return super.getHeaders();
        }
    };
}