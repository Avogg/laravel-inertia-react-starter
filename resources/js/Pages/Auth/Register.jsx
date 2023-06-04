import Guest from '@/Layouts/GuestLayout';
import { usePage, router } from '@inertiajs/react';
import { useState } from 'react';

export default function Register() {
    const { errors } = usePage().props

    const [values, setValues] = useState({
        name: "",
        email: "",
        password: ""
    })

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value
        setValues(values => ({
            ...values,
            [key]: value,
        }))
    }

    function handleSubmit(e) {
        e.preventDefault()
        router.post('/auth/store', values)
    }

    return (
        <Guest>
            <div className="w-full flex items-center justify-center">
                <div className="mt-14  bg-white rounded-lg shadow-lg w-3/4">
                    <div className="grid grid-cols-1 md:grid-cols-2">
                        <div><img src="/images/create-account-office.jpeg" alt="" /></div>
                        <div className="flex jusitfy-center items-center w-full">
                            <form onSubmit={handleSubmit} className="p-8 w-full space-y-5 ">
                                <div className='form-control'>
                                    <label>Nome</label>
                                    <input id='name' type="text" value={values.name} onChange={handleChange} className="input input-bordered w-full" />
                                    {errors.name && <span className="text-red-500">{errors.name}</span>}
                                </div>
                                <div className='form-control'>
                                    <label>Email</label>
                                    <input id='email' type="text" value={values.email} onChange={handleChange} className="input input-bordered w-full" />
                                    {errors.email && <span className="text-red-500">{errors.email}</span>}
                                </div>
                                <div className='form-control'>
                                    <label>Password</label>
                                    <input id='password' type="password" value={values.password} onChange={handleChange} className="input input-bordered w-full" />
                                    {errors.password && <span className="text-red-500">{errors.password}</span>}
                                </div>

                                <button type="submit" className='btn mt-5'>Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </Guest>
    );
}
