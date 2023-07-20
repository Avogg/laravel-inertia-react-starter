import Guest from "@/Layouts/GuestLayout";
import React from "react";

import { Link, usePage } from "@inertiajs/react";
import { ArrowDown, ChevronDown } from "react-feather";

function Welcome({ team }) {
    const { asset } = usePage().props;
    return (
        <Guest>
            <div className="grid-cols-3 grid"></div>
            <div className=" min-h-screen">
                <div className=" p-8 lg:p-24 flex justify-between items-center">
                    <img
                        src={`${asset}/images/rocket-white.png`}
                        alt=""
                        width={100}
                    />
                </div>

                <div className="w-screen  ">
                    <div className="block nd: flex-row-reverse md:flex items-center  justify-between lg:px-24">
                        <div className="flex items-center justify-center">
                            <img
                                src={`${asset}/images/rocket.png`}
                                width={150}
                                className="max-w-md md:hidden lg:hidden"
                            />
                            <img
                                src={`${asset}/images/rocket.png`}
                                className="max-w-md hidden md:block"
                            />
                        </div>
                        <div className="flex flex-col items-center md:items-start md:text-center text-white px-4">
                            <h1 className="text-center lg:text-start text-6xl font-bold">
                                Vamos descolar!
                            </h1>
                            <p class="py-6  text-center  text-lg max-w-md">
                                Provident cupiditate voluptatem et in. Quaerat
                                fugiat ut assumenda excepturi exercitationem
                                quasi. In deleniti eaque aut repudiandae et a id
                                nisi.
                            </p>
                        </div>
                    </div>
                </div>
                <div className="grid-cols-3 grid">
                    <img
                        src={`${asset}/images/clouds.png`}
                        className="max-w-sm px-4"
                        alt=""
                    />
                    <div className="flex items-start justify-center">
                        <ChevronDown
                            size={60}
                            className="text-white text-3xl"
                        />
                    </div>
                </div>
            </div>

            <div className="md:flex items-center">
                <div className="p-4 md:px-24 text-white ">
                    <p className="text-3xl font-bold">O SONHO 🫧</p>
                    <p className="text-lg">
                        Apoiar todas as crianças com Perturbações de
                        Aprendizagem Específicas, défice na leitura (Dislexia),
                        na escrita (Disortografia/Disgrafia) e/ou na matemática
                        (Discalculia).
                    </p>
                    <p className="text-3xl font-bold mt-6">O VOO ✈️</p>
                    <p className="text-lg font-bold">
                        A educação é para todos, mas nem sempre chega a todos!
                    </p>
                    <p className="text-lg">
                        Na descolar as crianças terão atendimento especializado
                        e poderão integrar a nossa bolsa social.
                    </p>
                    <p className="text-3xl font-bold mt-6 ">A DESCOLAGEM 🚀</p>
                    <p>
                        <span className="font-bold">
                            Todas as crianças devem ter direito a aprender, a
                            crescer com igualdade de oportunidades
                        </span>
                        , a tornar-se adultos confiantes, com sucesso e felizes.
                        <br />
                        Aqui… Não há exclusão! Há respostas! Não há limites!
                        Todos podem voar!
                    </p>
                </div>
                <div className="div"></div>
                <div className="div">
                    <img
                        src={`${asset}/images/children.png`}
                        alt=""
                        className="max-w-sm md:max-w-lg p-4 md:px-24"
                    />
                </div>
            </div>
            <div className="md:flex items-center mt-24">
                <div className="p-4 md:px-24 text-white ">
                    <p className="text-3xl font-bold">A Nossa Equipa</p>
                    <div className="mt-4 grid lg:grid-cols-3 gap-12">
                        {team.map((teammate) => {
                            return (
                                <div className="w-full mt-48 bg-white text-black px-24 rounded-lg flex flex-col items-center justify-center">
                                    <img
                                        src={
                                            asset + `/uploads/${teammate.photo}`
                                        }
                                        className="h-48 -mt-24 rounded-full"
                                        alt=""
                                    />
                                    <span className="font-bold text-3xl py-12">
                                        {teammate.name}
                                    </span>
                                </div>
                            );
                        })}
                    </div>
                </div>
            </div>
            <div className="md:flex items-center mt-24">
                <div className="p-4 md:px-24 text-white w-full ">
                    <p className="text-3xl font-bold">Contactos</p>
                    <div className="flex items-center  md:flex lg:justify-between">
                        <div className="mt-12">
                            <div className="text-bold">
                                <div className="font-bold">Morada:</div>Rua de
                                Cervantes, 414 , Porto, Portugal
                            </div>
                            <div className="text-bold">
                                <div className="font-bold">Telefone:</div>929
                                338 117
                            </div>
                            <div className="text-bold">
                                <div className="font-bold">Email:</div>
                                descolar.crl@gmail.com
                            </div>
                        </div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d504.6444440250881!2d-8.613677109490059!3d41.15971885525491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd24645577e4cc0d%3A0x786a394ebf3fe6cd!2sR.%20de%20Cervantes%20414%2C%20Porto!5e0!3m2!1spt-PT!2spt!4v1689854330320!5m2!1spt-PT!2spt"
                            width="600"
                            height="450"
                            allowFullScreen=""
                            loading="lazy"
                            referrerPolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>
                </div>
            </div>
        </Guest>
    );
}

export default Welcome;
