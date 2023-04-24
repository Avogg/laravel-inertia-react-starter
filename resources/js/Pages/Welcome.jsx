import Guest from "@/Layouts/GuestLayout";
import { usePage } from "@inertiajs/react";
import React from "react";

// import { Container } from './styles';

function Welcome() {
    const { asset } = usePage().props;
    return (
        <Guest>
            <div className="m-24">
                <h1 className="text-2xl font-bold mb-12">Jogos</h1>
                <div className="grid grid-cols-3 gap-8">
                    <div className="flex items-start">
                        <a
                            className="flex items-center justify-center gap-8"
                            href={route("doctors.psyquence.templates")}
                        >
                            <img src={`${asset}images/psyquence.svg`} alt="" />
                            <div>
                                <h2 className="text-xl font-bold">Psyquence</h2>
                                <p>
                                    Ordena as imagens e conta histórias com
                                    elas.
                                </p>
                            </div>
                        </a>
                    </div>
                    <a
                        className="flex items-center justify-center gap-8"
                        href={route("doctors.wrongword.show")}
                    >
                        <img
                            src={`${asset}images/palavra-diferente.svg`}
                            alt=""
                        />
                        <div>
                            <h2 className="text-xl font-bold">
                                Palavra intrusa
                            </h2>
                            <p>Descobre a palavra intrusa.</p>
                        </div>
                    </a>
                </div>
            </div>
        </Guest>
    );
}

export default Welcome;
