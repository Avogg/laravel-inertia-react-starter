import AdminLayout from '@/Layouts/AdminLayout';
import { usePage } from '@inertiajs/react';
import React, { useState } from 'react';
import { router } from "@inertiajs/react";

export default function CreateUser() {
    const { errors } = usePage().props

    const [values, setValues] = useState({
        name: "",
        email: "",
        password: "",
        is_admin: false
    })

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value
        setValues(values => ({
            ...values,
            [key]: value,
        }))
    }

    function handleChangeChecked(e) {
        const key = e.target.id;
        const value = e.target.checked;
        setValues(values => ({
            ...values,
            [key]: value,
        }))
    }

    const handleSubmit = (e) => {
        e.preventDefault()
        router.post(route('admins.users.store'), values);
    }

    return <AdminLayout header={'Create user'}>
        <div className="p-4 card bg-base-100 rounded-lg shadow-xs">
            <form onSubmit={handleSubmit}>
                <div className="grid grid-cols-1 lg:grid-cols-2">
                    <div className="form-control">
                        <label htmlFor="name" className='label'>Name</label>
                        <input type="text" id="name" value={values.name} onChange={handleChange} className="input input-bordered w-full max-w-xs" />
                        {errors.name && <span className="text-red-500">{errors.name}</span>}

                    </div>
                </div>
                <div className="grid grid-cols-1 lg:grid-cols-2">
                    <div className="form-control">
                        <label htmlFor="name" className='label'>Email</label>
                        <input type="text" id="email" value={values.email} onChange={handleChange} className="input input-bordered w-full max-w-xs" />
                        {errors.email && <span className="text-red-500">{errors.email}</span>}

                    </div>
                </div>
                <div className="grid grid-cols-1 lg:grid-cols-2">
                    <div className="form-control">
                        <label htmlFor="name" className='label'>Password</label>
                        <input type="text" id="password" value={values.password} onChange={handleChange} className="input input-bordered w-full max-w-xs" />
                        {errors.password && <span className="text-red-500">{errors.password}</span>}

                    </div>
                </div>

                <div className="form-control w-1/4">
                    <label className="label cursor-pointer">
                        <span className="label-text">Is administrator</span>
                        <input type="checkbox" id="is_admin" value="1" className="toggle" defaultChecked={values.is_admin} onChange={handleChangeChecked} />
                        {errors.is_admin && <span className="text-red-500">{errors.is_admin}</span>}
                    </label>
                </div>
                <button type="submit" className='btn mt-5'>Criar</button>
            </form>
        </div>
    </AdminLayout>;
}
