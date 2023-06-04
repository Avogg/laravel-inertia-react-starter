
# Laravel Starter (Inertia + React) 💜

![Screenhot](/public/readme-preview.png)

Welcome to the Laravel Inertia React Starter!

This starter kit provides a solid foundation for building web applications using Laravel, Inertia with React, and TailwindCSS with DaisyUI.

## Features
- **Laravel Setup:** The project comes pre-configured with Laravel, a powerful PHP framework for building web applications. Laravel provides a robust and secure backend foundation for your application.

- **Inertia with React:** Inertia is a lightweight framework that allows you to build single-page applications using server-side routing. With React, you can create dynamic and interactive user interfaces. Inertia eliminates the need for building a separate API and keeps your development workflow simple and efficient.

- **TailwindCSS with DaisyUI:** TailwindCSS is a highly customizable CSS framework that enables you to rapidly build stylish and responsive user interfaces. This starter kit includes TailwindCSS integrated with DaisyUI, a plugin that adds additional utility classes and components, enhancing your development experience.

- **Built-in Authentication:** Building user authentication from scratch can be time-consuming. This starter kit includes a built-in authentication system that allows you to quickly set up user registration, login, and password reset functionality. You can easily customize and extend the authentication features to meet your specific requirements.

- **Admins Dashboard:** Managing user roles and permissions is crucial for many applications. The Laravel Inertia React Starter includes an admins dashboard that provides an interface for managing user roles, permissions, and other administrative tasks. The dashboard is built using Inertia and React, providing a seamless and efficient user experience.

- **User Management:** The starter kit also includes user management features, allowing you to create, update, and delete user accounts. You can easily customize and extend these features to suit your application's needs. User management is an essential component of many applications, and this starter kit provides a solid foundation to get you started.

- **Laravel pint:** Laravel Inertia React Starter has Laravel Pint out of the box so you don't have to worry about fixing minor code inconsistences. 

## Installation

Start off by making sure that you have [Laravel](https:/laravel.com/) and [npm](https://www.npmjs.com/) installed, as they're essential to run the project.

After that, clone the repository into your local machine and access it. Take in account that, instead of ```my-project``` you should type the name of your project.

```bash
git clone https://github.com/Avogg/laravel-inertia-react-starter.git my-project
cd my-project
```

Now that you're already inside your project, you can set it up.

```bash
cp -r .env.example .env
composer install
php artisan key:generate
npm install
```

Configure your .env with all the information you need and now you can simply run the migrations using:

```bash
php artisan migrate
```

Congratulations, now you just have to run ```npm run build```and you're one of the cool kids. 😎
## License

The Laravel Inertia React Starter is open-source software licensed under the [MIT license](https://choosealicense.com/licenses/mit/).


## Acknowledgements

We would like to acknowledge the contributions of the Laravel, Inertia, React, and TailwindCSS communities for their excellent tools and resources that made this starter kit possible.

## Contributing

We welcome contributions to the Laravel Inertia React Starter! To contribute to the project, please follow these steps:

- **Create a new branch:** Before making any changes, create a new branch with a descriptive name for your feature or bug fix. We advise you to use something like this: ```bash mf/stock-management```, where "mf" are the initials of your name and "stock-management" the name of your feature. This helps to keep the main development branch, ```dev```, clean and allows for easier code review and collaboration.
- **Make your changes:** Write the necessary code changes, add new features, or fix bugs in your branch. Ensure that your changes adhere to the project's coding standards and guidelines.
- **Push your code:** Once you have made your changes and are ready to submit them, push your branch to the remote repository.
- **Create a pull request:** Go to the project's repository on GitHub and navigate to the "Pull Requests" section. Click on the "New pull request" button, and select the dev branch as the base branch and your newly created branch as the compare branch. Give your pull request a descriptive title and provide a clear summary of the changes you have made. If your pull request resolves an open issue, reference it in the description. After reviewing your changes, one of the project maintainers will provide feedback or merge your pull request into the dev branch.

> **Note:** Please ensure that your branch is up to date with the latest changes from the dev branch before creating a pull request.


## Authors

- [Avogg](https://avogg.pt)


## Feedback

If you have any feedback, please reach out to us at geral@avogg.pt! 💜
