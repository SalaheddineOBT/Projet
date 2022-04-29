package com.example.myapplication

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.Handler
import android.view.animation.AnimationUtils
import android.widget.TextView
import pl.droidsonroids.gif.GifImageView

class SplashScreen : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_splash_screen)

        val txt:TextView=findViewById(R.id.txtspsh)
        val gifimg:GifImageView=findViewById(R.id.gifImageView)

        val animaright=AnimationUtils.loadAnimation(this,R.anim.right_anim)
        val animatop=AnimationUtils.loadAnimation(this,R.anim.top_animation)
        val animabottom=AnimationUtils.loadAnimation(this,R.anim.bottom_anim)
        val animaleft=AnimationUtils.loadAnimation(this,R.anim.left_anim)

        txt.startAnimation(animatop)
        gifimg.startAnimation(animaright)

        val splashtimeout=6000
        val splashtimeout1=5300

        Handler().postDelayed({
            txt.startAnimation(animabottom)
            gifimg.startAnimation(animaleft)
        },splashtimeout1.toLong())

        Handler().postDelayed({
            startActivity(Intent(this@SplashScreen,IntroActivity::class.java))
            finish()
        },splashtimeout.toLong())

    }
}