import Guest from "@/Layouts/GuestLayout";
import React from "react";

import { Link } from '@inertiajs/react';

function Welcome() {
    return (
        <Guest>
            <div className="w-full flex flex-col justify-center text-center p-10 mt-10">
                <p className="text-primary uppercase text-6xl font-bold">Welcome!</p>
                <p className="mt-5">This is your <Link as="paragraph" href="https://inertiajs.com/" target="_blank" className="link link-primary">Laravel Intertia</Link> with React template!</p>

                <p>Go to <span className="kbd kbd-sm p-1 text-white bg-primary mt-3">resources/js/Pages/Welcome.jsx</span> to start creating your app!</p>

                <div className="grid md:grid-cols-3 gap-x-10 mt-10">
                    <div className="card w-full bg-base-100 shadow-xl">
                        <div className="card-body text-left">
                            <h2 className="card-title">Fast apps</h2>
                            <p>Build and deploy apps with the amazing performance of a progressive web app, thanks to the power of react.</p>
                        </div>
                    </div>
                    <div className="card w-full bg-base-100 shadow-xl">
                        <div className="card-body text-left">
                            <h2 className="card-title">Productivity</h2>
                            <p>With no need to develop an API to conect to your fast frontend, your productivity increases as you only have to worry about building amazing features.</p>
                        </div>
                    </div>
                    <div className="card w-full bg-base-100 shadow-xl">
                        <div className="card-body text-left">
                            <h2 className="card-title">Beautiful design</h2>
                            <p>With the support of <Link href="https://daisyui.com/" target="_blank" className="link link-primary">DaisyUI</Link>, building interfaces using TailwindCSS is way easier and more enjoyable.</p>
                        </div>
                    </div>
                </div>

                <p className="text-sm mt-20">Made with 💜 by Avogg</p>
            </div>
        </Guest>
    );
}

export default Welcome;
