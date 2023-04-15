import React, { useEffect, useState } from "react";
import get from "lodash/get";
import { Link, router, usePage, useRemember } from "@inertiajs/react";
import Pagination from "@/Components/Shared/Pagination";
import { ChevronDown, ChevronUp } from "react-feather";

// import { Container } from './styles';

/*
 * key:string
 *title:string
 *width:number
 *render
 */

function Table({ columns, data, route, pagination, order, orderBy }) {
    const { filters } = usePage().props;
    const [query, setQuery] = useState(null);
    const [field, setField] = useState(null);
    const [direction, setDirection] = useState(null);

    const handleChange = (e) => {
        setQuery(e.target.value);
    };

    const sort = (key) => {
        setField(key);
        setDirection(direction === "asc" ? "desc" : "asc");
    };

    useEffect(() => {
        if (field !== null || query !== null || direction !== null) {
            router.get(
                route,
                { search: query, field: field, direction: direction },
                { preserveState: true }
            );
        }
    }, [field, direction, query]);

    useEffect(() => {
        if (filters) {
            setQuery(filters.search);
        }
        setDirection(direction), setField(field);
    }, []);

    return (
        <div>
            <div class="form-control">
                <div class="input-group">
                    <input
                        type="text"
                        value={query}
                        onChange={handleChange}
                        placeholder="Search…"
                        class="input input-bordered mb-5"
                    />
                    <button class="btn btn-square">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                strokeLinejoin="round"
                                strokeWidth={2}
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>
                    </button>
                </div>
            </div>
            <table className="table table-zebra w-full">
                <thead>
                    <tr>
                        {columns.map((column, index) =>
                            column.sortable ? (
                                <th
                                    className="cursor-pointer "
                                    onClick={() => sort(column.key)}
                                    style={{ width: column.width }}
                                    key={`table-header-${index}`}
                                >
                                    <span className="flex items-center justify-between">
                                        {column.title}{" "}
                                        {field === column.key ? (
                                            direction === "asc" ? (
                                                <ChevronUp />
                                            ) : (
                                                <ChevronDown />
                                            )
                                        ) : (
                                            ""
                                        )}
                                    </span>
                                </th>
                            ) : (
                                <th
                                    style={{ width: column.width }}
                                    key={`table-header-${index}`}
                                >
                                    {column.title}
                                </th>
                            )
                        )}
                    </tr>
                </thead>
                <tbody>
                    {data.data.length == 0 && (
                        <td colSpan={columns.length}>Sem resultados</td>
                    )}
                    {data.data.map((item, index) => (
                        <tr key={`table-row-${index}`}>
                            {columns.map((column, indexColumn) => {
                                const value = get(item, column.key);
                                return (
                                    <td>
                                        {column.render
                                            ? column.render(column, item)
                                            : value}
                                    </td>
                                );
                            })}
                        </tr>
                    ))}
                </tbody>
            </table>
            {pagination && (
                <div className="flex mt-5 rgap-8">
                    <Pagination data={data} />
                    <p>Total: {data.total}</p>
                </div>
            )}
        </div>
    );
}

export default Table;
