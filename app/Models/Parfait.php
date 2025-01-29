<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parfait extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'title',
        'description',
        'category',        // Optional: if you want to categorize projects
        'technologies',    // Optional: if you want to list technologies used
        'image',           // Optional: if you want to upload an image
        'github_link',     // Optional: link to GitHub repository
        'live_link',       // Optional: link to the live project
        'is_featured',     // Optional: boolean to mark if the project is featured
        'order'            // Optional: integer to define the order of projects
    ];
}