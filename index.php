<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$route = new Router(url(), ":");
$route->namespace("Source\App");

/**
 * WEB ROUTES
 */
$route->group(null);
$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");
$route->get("/nossa-historia", "Web:history");
$route->get("/contato", "Web:contact");
$route->post("/contato", "Web:contactForm");

//blog
$route->group("/blog");
$route->get("/", "Web:blog");
$route->get("/p/{page}", "Web:blog");
$route->get("/{uri}", "Web:blogPost");
$route->post("/buscar", "Web:blogSearch");
$route->get("/buscar/{search}/{page}", "Web:blogSearch");
$route->get("/em/{category}", "Web:blogCategory");
$route->get("/em/{category}/{page}", "Web:blogCategory");

//catalogos
$route->group("/catalogos");
$route->get("/", "Web:catalog");
$route->get("/p/{page}", "Web:catalog");
$route->post("/buscar", "Web:catalogSearch");
$route->get("/buscar/{search}/{page}", "Web:catalogSearch");

//categorias
$route->group("/produtos");
$route->get("/", "Web:categories");
$route->get("/p/{page}", "Web:categories");

//produtos
$route->group("/detalhes");
$route->get("/{category}", "Web:products");
$route->post("/{category}", "Web:products");
$route->get("/", "Web:products");


$route->get("/em/{category}", "Web:produtosCategory");
$route->get("/em/{category}/{page}", "Web:produtosCategory");

//auth
$route->group(null);
$route->get("/entrar", "Web:login");
$route->post("/entrar", "Web:login");
$route->get("/cadastrar", "Web:register");
$route->post("/cadastrar", "Web:register");
$route->get("/recuperar", "Web:forget");
$route->post("/recuperar", "Web:forget");
$route->get("/recuperar/{code}", "Web:reset");
$route->post("/recuperar/resetar", "Web:reset");

//optin
$route->group(null);
$route->get("/confirma", "Web:confirm");
$route->get("/obrigado/{email}", "Web:success");

/**
 * APP
 */
$route->group("/app");
$route->get("/", "App:home");
$route->get("/boletos", "App:billet");
$route->get("/perfil", "App:profile");
$route->get("/sair", "App:logout");

$route->post("/dash", "App:dash");
$route->post("/boletos", "App:billet");
$route->post("/profile", "App:profile");
$route->post("/support", "App:support");

/**
 * ADMIN ROUTES
 */
$route->namespace("Source\App\Admin");
$route->group("/admin");

//login
$route->get("/", "Login:root");
$route->get("/login", "Login:login");
$route->post("/login", "Login:login");

//dash
$route->get("/dash", "Dash:dash");
$route->get("/dash/home", "Dash:home");
$route->post("/dash/home", "Dash:home");
$route->get("/logoff", "Dash:logoff");

//control
$route->get("/control/home", "Control:home");

//slides
$route->get("/slides/home", "Slide:home");
$route->post("/slides/home", "Slide:home");
$route->get("/slides/post", "Slide:post");
$route->post("/slides/post", "Slide:post");
$route->get("/slides/post/{post_id}", "Slide:post");
$route->post("/slides/post/{post_id}", "Slide:post");

//compania
$route->get("/empresa/home", "Company:home");
$route->post("/empresa/home", "Company:home");
$route->get("/empresa/post", "Company:post");
$route->post("/empresa/post", "Company:post");
$route->get("/empresa/post/{post_id}", "Company:post");
$route->post("/empresa/post/{post_id}", "Company:post");

//historia
$route->get("/historia/home", "History:home");
$route->post("/historia/home", "History:home");
$route->get("/historia/home/{search}/{page}", "History:home");
$route->get("/historia/post", "History:post");
$route->post("/historia/post", "History:post");
$route->get("/historia/post/{post_id}", "History:post");
$route->post("/historia/post/{post_id}", "History:post");

//blog
$route->get("/blog/home", "Blog:home");
$route->post("/blog/home", "Blog:home");
$route->get("/blog/home/{search}/{page}", "Blog:home");
$route->get("/blog/post", "Blog:post");
$route->post("/blog/post", "Blog:post");
$route->get("/blog/post/{post_id}", "Blog:post");
$route->post("/blog/post/{post_id}", "Blog:post");
$route->get("/blog/categories", "Blog:categories");
$route->get("/blog/categories/{page}", "Blog:categories");
$route->get("/blog/category", "Blog:category");
$route->post("/blog/category", "Blog:category");
$route->get("/blog/category/{category_id}", "Blog:category");
$route->post("/blog/category/{category_id}", "Blog:category");

//produtos
$route->get("/produtos/home", "Produto:home");
$route->post("/produtos/home", "Produto:home");
$route->get("/produtos/home/{search}/{page}", "Produto:home");
$route->get("/produtos/post", "Produto:post");
$route->post("/produtos/post", "Produto:post");
$route->get("/produtos/post/{post_id}", "Produto:post");
$route->post("/produtos/post/{post_id}", "Produto:post");

//categorias
$route->get("/produtos/categories", "Produto:categories");
$route->get("/produtos/categories/{page}", "Produto:categories");
$route->get("/produtos/category", "Produto:category");
$route->post("/produtos/category", "Produto:category");
$route->get("/produtos/category/{category_id}", "Produto:category");
$route->post("/produtos/category/{category_id}", "Produto:category");

//subcategorias
$route->get("/produtos/subcategories", "Produto:subCategories");
$route->get("/produtos/subcategories/{page}", "Produto:subCategories");
$route->get("/produtos/subcategory", "Produto:subCategory");
$route->post("/produtos/subcategory", "Produto:subCategory");
$route->get("/produtos/subcategory/{category_id}", "Produto:subCategory");
$route->post("/produtos/subcategory/{category_id}", "Produto:subCategory");

//catalogos
$route->get("/catalogos/home", "Catalogo:home");
$route->post("/catalogos/home", "Catalogo:home");
$route->get("/catalogos/home/{search}/{page}", "Catalogo:home");
$route->get("/catalogos/post", "Catalogo:post");
$route->post("/catalogos/post", "Catalogo:post");
$route->get("/catalogos/post/{post_id}", "Catalogo:post");
$route->post("/catalogos/post/{post_id}", "Catalogo:post");
$route->get("/catalogos/categories", "Catalogo:categories");
$route->get("/catalogos/categories/{page}", "Catalogo:categories");
$route->get("/catalogos/category", "Catalogo:category");
$route->post("/catalogos/category", "Catalogo:category");
$route->get("/catalogos/category/{category_id}", "Catalogo:category");
$route->post("/catalogos/category/{category_id}", "Catalogo:category");

//users
$route->get("/users/home", "Users:home");
$route->post("/users/home", "Users:home");
$route->get("/users/home/{search}/{page}", "Users:home");
$route->get("/users/user", "Users:user");
$route->post("/users/user", "Users:user");
$route->get("/users/user/{user_id}", "Users:user");
$route->post("/users/user/{user_id}", "Users:user");

/**
 * ERROR ROUTES
 */
$route->group("/ops");
$route->get("/{errcode}", "Web:error");

/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();