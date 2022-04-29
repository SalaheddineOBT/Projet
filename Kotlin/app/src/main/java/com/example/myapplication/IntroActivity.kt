package com.example.myapplication

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.ViewGroup.LayoutParams.WRAP_CONTENT
import android.widget.*
import androidx.core.content.ContextCompat
import androidx.core.view.get
import androidx.viewpager2.widget.ViewPager2
import com.google.android.material.button.MaterialButton

class IntroActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_intro)

        val introSlideAdapter=IntroSlideAdapter(
            listOf(
                introslide(""+getString(R.string.Item_title_1), ""+getString(R.string.Item_Desc_1), R.drawable.slideimg1),
                introslide(""+getString(R.string.Item_title_2), ""+getString(R.string.Item_Desc_2), R.drawable.slideimg2),
                introslide(""+getString(R.string.Item_title_3), ""+getString(R.string.Item_Desc_3), R.drawable.slideimg3),
                //introslide(""+getString(R.string.Item_title_4), ""+getString(R.string.Item_Desc_4),R.drawable.slideimg4),
                ///introslide(""+getString(R.string.Item_title_5), ""+getString(R.string.Item_Desc_5), R.drawable.slideimg5),
            )
        )

        val intoSlideViewPage:ViewPager2=findViewById(R.id.indviewpg)
        val btnext=findViewById<Button>(R.id.nextbtn)
        val txtskip=findViewById<TextView>(R.id.txtskip)
        val indecatorslnr:LinearLayout=findViewById(R.id.indecators)
        val txtback:TextView=findViewById(R.id.txt1)

        intoSlideViewPage.adapter=introSlideAdapter
        intoSlideViewPage.setUserInputEnabled(false);

        txtback.setOnClickListener{
            if(intoSlideViewPage.currentItem + 1 > 0){
                intoSlideViewPage.currentItem -= 1
                btnext.text="Next"
            }
        }

        val indicators= arrayOfNulls<ImageView>(introSlideAdapter.itemCount)
        val layoutParams:LinearLayout.LayoutParams = LinearLayout.LayoutParams(WRAP_CONTENT, WRAP_CONTENT)
        layoutParams.setMargins(15,0,15,0)
        for(i in indicators.indices){
            indicators[i]= ImageView(applicationContext)
            indicators[i].apply {
                this?.setImageDrawable(ContextCompat.getDrawable(applicationContext,R.drawable.indecator_inactive))
                this?.layoutParams= layoutParams
            }
            indecatorslnr.addView(indicators[i])
        }

        txtskip.setOnClickListener{
            startActivity(Intent(this@IntroActivity,GetStartedActivity::class.java))
            finish()
        }

        btnext.setOnClickListener{
            if(intoSlideViewPage.currentItem + 1 < introSlideAdapter.itemCount){
                intoSlideViewPage.currentItem += 1
            }else{
                Intent(this@IntroActivity,GetStartedActivity::class.java).also {
                    startActivity(it)
                    finish()
                }
            }
            if(intoSlideViewPage.currentItem + 1 == introSlideAdapter.itemCount){
                btnext.text="Get Started"
            }
        }

        val childCount=indecatorslnr.childCount
        for(i in 0 until childCount ){
            val imageview=indecatorslnr.get(i) as ImageView
            if(i == 0){
                imageview.setImageDrawable(ContextCompat.getDrawable(applicationContext, R.drawable.indicator_active))
            }else{
                imageview.setImageDrawable(ContextCompat.getDrawable(applicationContext, R.drawable.indecator_inactive))
            }
        }

        intoSlideViewPage.registerOnPageChangeCallback(object:ViewPager2.OnPageChangeCallback(){
            override fun onPageSelected(position: Int) {
                super.onPageSelected(position)
                val childCount=indecatorslnr.childCount
                for(i in 0 until childCount ){
                    val imageview=indecatorslnr.get(i) as ImageView
                    if(i == position){
                        imageview.setImageDrawable(ContextCompat.getDrawable(applicationContext, R.drawable.indicator_active))
                    }else{
                        imageview.setImageDrawable(ContextCompat.getDrawable(applicationContext, R.drawable.indecator_inactive))
                    }
                }
            }
        })

    }
}