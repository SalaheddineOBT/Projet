package com.example.myapplication

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.*
import androidx.recyclerview.widget.RecyclerView

class IntroSlideAdapter(private val introSlide:List<introslide>): RecyclerView.Adapter<IntroSlideAdapter.InroSlideViewHolder>(){

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): InroSlideViewHolder {
        return InroSlideViewHolder(
            LayoutInflater.from(parent.context).inflate(
                R.layout.slide_item,parent,false
            )
        )
    }

    override fun onBindViewHolder(holder: InroSlideViewHolder, position: Int) {
        holder.bind(introSlide[position])
    }

    override fun getItemCount(): Int {
        return introSlide.size
    }

    inner class InroSlideViewHolder(view: View):RecyclerView.ViewHolder(view){

        private val textTile=view.findViewById<TextView>(R.id.titletxtx)
        private val textDesc=view.findViewById<TextView>(R.id.descrtxtx)
        private val Img=view.findViewById<ImageView>(R.id.imgslide)

        fun bind(introSlide:introslide){
            textTile.text=introSlide.title
            textDesc.text=introSlide.description
            Img.setImageResource(introSlide.icon)

        }
    }
}