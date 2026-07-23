<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

Route::resource("/posts", PostController::class);
Route::resource("/users", UserController::class);
Route::resource("/categories", CategoryController::class);

Route::get("/", [SiteController::class, 'index'])->name("home");
Route::get("/postagem/", [SiteController::class, 'search'])->name("search");
Route::get("/{slug}", [SiteController::class, 'post'])->name("post");
Route::get("/postagens/{id}", [SiteController::class, 'categories'])->name("posts.category");

Route::prefix("/admin")->group(function () {
    Route::get("/dashboard", [DashboardController::class, 'index'])->name("admin.dashboard");
    Route::get("/users", [UserController::class, 'index'])->name("admin.users");
    Route::get("/posts", [PostController::class, 'index'])->name("admin.posts");
    Route::get("/categories", [CategoryController::class, 'index'])->name("admin.categories");
    Route::get("/create-post", [PostController::class, 'index_create'])->name("admin.create_post");
})->middleware("auth");

Route::get("/auth/logout", [LoginController::class, 'logout'])->name("logout");
Route::view("/auth/login", "login")->name("login.form");
Route::view("/auth/registrar", "register")->name("register.form");

Route::post("/auth", [LoginController::class, 'auth'])->name("auth");
Route::post("/post/comment/{title}", [CommentController::class, 'MakeComment'])->name("comment");
