import Table from "@/Components/Table/Table";
import AdminLayout from "@/Layouts/AdminLayout";
import Pagination from "@/Components/Shared/Pagination";
import { Link, router, useRemember } from "@inertiajs/react";
import { useEffect, useRef, useState } from "react";
import DataTable from "react-data-table-component";
import { ChevronLeft, ChevronRight } from "react-feather";

export default function UserIndex({ users }) {
    const [removeUser, setRemoveUser] = useState(null);
    const deleteRef = useRef();
    const deleteUser = () => {
        if (removeUser === null) {
            return;
        }
        router.delete(`/admins/users/${removeUser}`, {
            preserveScroll: true,
            preserveState: true,
        });
        deleteRef.current.checked = false;
    };
    const columns = [
        {
            key: "id",
            title: "#",
            width: 50,
            sortable: true,
        },
        {
            key: "name",
            title: "Nome",
            width: 100,
            sortable: true,
        },
        {
            key: "email",
            title: "Email",
            sortable: true,
            width: 200,
        },
        {
            key: "actions",
            title: "Ações",
            width: 200,
            render: (column, item) => {
                return (
                    <div className="flex gap-8">
                        <a
                            href={route("admins.users.edit", item)}
                            className="btn btn-sm btn-warning"
                        >
                            Editar
                        </a>
                        <label
                            htmlFor="my-modal-4"
                            onClick={() => {
                                setRemoveUser(item.id);
                            }}
                            className="btn btn-sm btn-error"
                        >
                            Remover
                        </label>
                    </div>
                );
            },
        },
    ];

    return (
        <AdminLayout
            header={"Utilizadores"}
            create={route("admins.users.create")}
        >
            <input
                type="checkbox"
                id="my-modal-4"
                ref={deleteRef}
                className="modal-toggle"
            />
            <label htmlFor="my-modal-4" className="modal cursor-pointer">
                <label className="modal-box relative" htmlFor="">
                    <h3 className="text-lg font-bold">Remover utilizador</h3>
                    <p className="py-4">Pretende remover este utilizador?</p>
                    <button className="btn btn-error" onClick={deleteUser}>
                        Remover
                    </button>
                </label>
            </label>
            <div className="overflow-x-auto">
                <Table
                    columns={columns}
                    data={users}
                    route={"/admins/users"}
                    pagination
                ></Table>
            </div>
        </AdminLayout>
    );
}
