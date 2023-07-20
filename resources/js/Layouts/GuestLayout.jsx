import { Link, usePage } from "@inertiajs/react";

import { User } from "react-feather";

export default function Guest({ children }) {
    const { logo, auth } = usePage().props;

    return (
        <div className="flex h-screen bg-[#2383AA]">
            <main className="h-full overflow-y-auto">{children}</main>
        </div>
    );
}
