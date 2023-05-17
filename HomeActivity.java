package com.example.weatherbox;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class HomeActivity extends AppCompatActivity {

    private TextView name, fname;
    private Button btn_logout;
    private TextView link_search;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        name=findViewById(R.id.name);
        fname=findViewById(R.id.fname);
        btn_logout=findViewById(R.id.btn_logout);
        link_search=findViewById(R.id.link_search);

        Intent intent=getIntent();
        String extraName=intent.getStringExtra("name");
        String extraFName=intent.getStringExtra("fname");

        name.setText(extraName);
        fname.setText(extraFName);

        btn_logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });

        link_search.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(HomeActivity.this,SearchActivity.class));
            }
        });
    }
}
