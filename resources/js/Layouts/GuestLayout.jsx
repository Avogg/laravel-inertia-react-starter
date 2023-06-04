import { Link, usePage } from "@inertiajs/react";

import { User } from "react-feather";

export default function Guest({ children }) {
    const { logo, auth } = usePage().props;

    return (
        <div className="flex h-screen bg-gray-50">
            <div className="flex flex-col flex-1 w-full">
                <div>
                    <div className="px-4 md:px-24 w-screen bg-white border-gray-200  h-20 flex items-center justify-between ">
                        <div className="flex space-x-5 items-center justify-center">
                            <Link href={route("welcome")}>
                                <img
                                    src={logo}
                                    width="200"
                                    className="px-2 md:px-0 md:flex w-12"
                                    alt=""
                                />
                            </Link>
                        </div>

                        <div className="hidden md:flex space-x-5 items-center text-primary">
                            <Link
                                className="text-gray-700"
                                href={route("welcome")}
                            >
                                Home
                            </Link>
                            {auth.user?.is_admin === 1 && (
                                <Link className="btn btn-ghost" href="/admins">
                                    Administration area
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
                                                Register
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
