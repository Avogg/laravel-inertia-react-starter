import { Link, router, usePage } from "@inertiajs/react";

import { User } from "react-feather";

export default function Guest({ children }) {
    const { logo, auth, subscription } = usePage().props;

    return (
        <div className="flex h-screen bg-gray-50">
            <div className="flex flex-col flex-1 w-full">
                {subscription.onTrial && (
                    <div className="w-full h-12 bg-primary flex items-center justify-center text-white">
                        Está a usufruir da versão de apresentação.{" "}
                        <a href="/billing" className="underline">
                            Compre aqui o plano premium
                        </a>
                    </div>
                )}
                <div>
                    <div className="px-4 md:px-24 w-screen bg-white border-gray-200  h-20 flex items-center justify-between ">
                        <div className="flex space-x-5 items-center justify-center">
                            <a href={route("welcome")}>
                                <img
                                    src={logo}
                                    width="200"
                                    className="px-2 md:px-0 md:flex w-12"
                                    alt=""
                                />
                            </a>
                        </div>

                        <div className="hidden md:flex space-x-5 items-center text-primary">
                            <Link
                                className="text-gray-700"
                                href={route("welcome")}
                            >
                                Início
                            </Link>

                            {auth.user?.is_admin === 1 && (
                                <Link className="btn btn-ghost" href="/admins">
                                    Área de Administração
                                </Link>
                            )}

                            <div className="dropdown dropdown-end">
                                <label
                                    tabIndex={0}
                                    className="m-1 cursor-pointer"
                                >
                                    <User />
                                </label>
                                {auth.user ? (
                                    <ul
                                        tabIndex={0}
                                        className="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52"
                                    >
                                        <li>
                                            <Link href="/billing">
                                                Pagamentos
                                            </Link>
                                        </li>
                                        <li>
                                            <Link href="/auth/logout">
                                                Logout
                                            </Link>
                                        </li>
                                    </ul>
                                ) : (
                                    <ul
                                        tabIndex={0}
                                        className="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52"
                                    >
                                        <li>
                                            <Link href="/auth/register">
                                                Registar
                                            </Link>
                                        </li>
                                        <li>
                                            <Link href="/auth/login">
                                                Log In
                                            </Link>
                                        </li>
                                    </ul>
                                )}
                            </div>
                        </div>
                    </div>
                </div>

                <main className="h-full overflow-y-auto">{children}</main>
            </div>
        </div>
    );
}