<?php 

namespace App\Models;


class Listing
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'First Listing',
                'body' => 'This is the body of the first listing lorem ipsum dolor sit amet'
            ],
            [
                'id' => 2,
                'title' => 'Second Listing',
                'body' => 'This is the body of the second listing lorem ipsum dolor sit amet consectetur adipisicing elit'
            ],
            [
                'id' => 3,
                'title' => 'Third Listing',
                'body' => 'This is the body of the third listing lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua'
            ]
        ];
    }


    public static function find($id)
    {
        $listings = self::all();

        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }

     
    }       
}

