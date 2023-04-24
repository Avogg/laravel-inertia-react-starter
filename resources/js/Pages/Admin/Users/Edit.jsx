import AdminLayout from '@/Layouts/AdminLayout';
import { usePage } from '@inertiajs/react';
import React, { useState } from 'react';
;import { router } from "@inertiajs/react";


// import { Container } from './styles';

function Users({user}) {
    const { errors } = usePage().props

    const [values, setValues] = useState({
        name: user.name,
        email: user.email,
        password: "",
        is_admin: user.is_admin ? true : false
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
        router.put(route('admins.users.update', user), values);
      }

  return <AdminLayout header={'Editar Utilizador'}>
        <div className="p-4 card bg-base-200 rounded-lg shadow-xs">
            <form onSubmit={handleSubmit}>
                <div className="grid grid-cols-1 lg:grid-cols-2">
                    <div className="form-control">
                        <label htmlFor="name" className='label'>Nome</label>
                        <input type="text" id="name" value={values.name} onChange={handleChange} className="input input-bordered w-full max-w-xs" />
                        {errors.name && <span className="text-red-500">{ errors.name }</span>}

                    </div>
                </div>
                <div className="grid grid-cols-1 lg:grid-cols-2">
                    <div className="form-control">
                        <label htmlFor="name" className='label'>Email</label>
                        <input type="text" id="email" value={values.email} onChange={handleChange} className="input input-bordered w-full max-w-xs" />
                        {errors.email && <span className="text-red-500">{ errors.email }</span>}

                    </div>
                </div>
                <div className="grid grid-cols-1 lg:grid-cols-2">
                    <div className="form-control">
                        <label htmlFor="name" className='label'>Password</label>
                        <input type="text" id="password" value={values.password} onChange={handleChange} className="input input-bordered w-full max-w-xs" />
                        {errors.password && <span className="text-red-500">{ errors.password }</span>}

                    </div>
                </div>

                <div className="form-control w-1/4">
                    <label className="label cursor-pointer">
                        <span className="label-text">Administrador</span>
                        <input type="checkbox" id="is_admin" value="1" className="toggle" defaultChecked={values.is_admin} onChange={handleChangeChecked} />
                        {errors.is_admin && <span className="text-red-500">{ errors.is_admin }</span>}
                    </label>
                </div>

                <button type="submit" className='btn mt-5'>Editar</button>
            </form>
        </div>
    </AdminLayout>;
}

export default Users;
