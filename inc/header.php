<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?? 'Creating Blog' ?></title>
</head>

<body class="flex flex-col min-h-screen">
    <header>
        <nav class="container mx-auto flex max-w-3xl flex-wrap items-start justify-between px-8 pt-2">
            <div>
                <h1>
                    <a class="text-4xl font-extrabold" href="/">Creating Blog</a>
                </h1>
                <p>My personal simple blog...</p>
            </div>

            <ul class="mt-6 flex flex-wrap space-x-2 font-medium">
                <?php if (is_loggedin()) : ?>
                    <li>
                        <a href="/admin">Dashboard</a>
                    </li>
                    <li>
                        <a href="/actions/logout.php">Logout</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main class="container mx-auto max-w-3xl grow p-8">