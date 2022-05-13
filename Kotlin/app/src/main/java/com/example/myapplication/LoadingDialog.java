package com.example.myapplication;

import android.app.Activity;
import android.app.AlertDialog;
import android.view.LayoutInflater;

public class LoadingDialog {

    private Activity activity;
    private AlertDialog dialog;

    LoadingDialog(Activity myactivity){
        activity=myactivity;
    }

    void sartloadingAlert(){
        AlertDialog.Builder builder=new AlertDialog.Builder(activity);
        LayoutInflater inflater=activity.getLayoutInflater();
        builder.setView(inflater.inflate(R.layout.custom_dialog,null));
        builder.setCancelable(true);
        dialog=builder.create();
        dialog.show();
    }

    void dimissDialog(){
        dialog.dismiss();
    }

}
