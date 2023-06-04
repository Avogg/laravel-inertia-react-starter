import { Link, router, usePage } from "@inertiajs/react";
import { ChevronDown, Plus } from "react-feather";

export default function AdminLayout({ children, header, create, optionalButtons }) {
    const { logo, auth } = usePage().props;
    const component = usePage().component;
    return (
        <>
            <div className="navbar bg-base-100 shadow-sm border border-gray-100">
                <div className="flex-1">
                    <Link
                        href="#"
                        className="btn btn-ghost normal-case text-xl"
                    >
                        <img src={logo} width="45" />
                    </Link>
                </div>
                <div className="flex-none mr-4">
                    <div className="dropdown dropdown-end">
                        <label
                            tabIndex={"0"}
                            className="flex items-center justify-center gap-4 cursor-pointer"
                        >
                            {auth.user.name}
                            <ChevronDown />
                        </label>
                        <ul
                            tabIndex="0"
                            className="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52"
                        >
                            <li>
                                <Link href="/auth/logout">Logout</Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div className="drawer drawer-mobile">
                <input
                    id="my-drawer-2"
                    type="checkbox"
                    className="drawer-toggle"
                />
                <div className="drawer-content">
                    <div className="artboard px-6">
                        <div className="flex items-center justify-between">
                            <h2 className="my-6 text-2xl font-semibold">
                                {header}
                            </h2>
                            {create && (
                                <a
                                    href={create}
                                    className="btn btn-primary flex gap-4"
                                >
                                    <Plus /> Create
                                </a>
                            )}
                            {
                                optionalButtons && (
                                    optionalButtons.map((optionalButton, key) => {
                                        return <Link href={optionalButton.link} key={key} as="button" className="btn btn-outline btn-primary">{optionalButton.text}</Link>
                                    })
                                )
                            }
                        </div>

                        <div>{children}</div>
                    </div>
                </div>
                <div className="drawer-side shadow-sm border border-gray-100">
                    <label
                        htmlFor="my-drawer-2"
                        className="drawer-overlay"
                    ></label>
                    <ul className="menu p-4 w-80 bg-base-100 text-base-content">
                        <li>
                            <a
                                href="/admins"
                                className={
                                    component === "Admin/Dashboard"
                                        ? "active"
                                        : " "
                                }
                            >
                                Home
                            </a>
                        </li>

                        <li className="menu-title">
                            <span>Items</span>
                        </li>
                        <div className="space-y-5">
                            <li>
                                <a
                                    href="/admins/users"
                                    className={
                                        component === "Admin/Users/Index"
                                            ? "active"
                                            : " "
                                    }
                                >
                                    Users
                                </a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </>
    );
}
