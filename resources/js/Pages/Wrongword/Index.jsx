import Guest from "@/Layouts/GuestLayout";
import React, { useEffect, useState } from "react";
import { _, delay, random } from "lodash";

// import { Container } from './styles';

const Wrongword = () => {
    const words = {
        abelha: {
            tip: "Abelha",
            relacionadas: [
                "mel",
                "pólen",
                "colmeia",
                "zangão",
                "flor",
                "favos",
                "rainha",
                "néctar",
                "picada",
            ],
            nao_relacionada: "caneta",
        },
        amarelo: {
            tip: "Amarelo",
            relacionadas: [
                "sol",
                "banana",
                "ovo",
                "milho",
                "girassol",
                "abelha",
                "abacaxi",
                "fogo",
                "laranja",
            ],
            nao_relacionada: "almofada",
        },
        avião: {
            tip: "Avião",
            relacionadas: [
                "piloto",
                "aeroporto",
                "asas",
                "nuvens",
                "passageiros",
                "céu",
                "helicóptero",
                "janela",
                "porto",
            ],
            nao_relacionada: "chave",
        },
        balão: {
            tip: "Balão",
            relacionadas: [
                "festa",
                "ar",
                "corda",
                "bexiga",
                "colorido",
                "céu",
                "parque",
                "nuvens",
                "flutuar",
            ],
            nao_relacionada: "sofá",
        },
        borboleta: {
            tip: "Borboleta",
            relacionadas: [
                "asa",
                "cores",
                "flor",
                "larva",
                "jardim",
                "casulo",
                "pupa",
                "beija-flor",
                "abelha",
            ],
            nao_relacionada: "telemóvel",
        },
        brinquedo: {
            tip: "Brinquedo",
            relacionadas: [
                "criança",
                "diversão",
                "jogar",
                "peluche",
                "boneca",
                "carro",
                "quebra-cabeça",
                "carrinho",
                "bola",
            ],
            nao_relacionada: "cadeira",
        },
        cachorro: {
            tip: "Cachorro",
            relacionadas: [
                "ladrar",
                "patas",
                "ração",
                "focinho",
                "coleira",
                "cauda",
                "lambidela",
                "brinquedo",
                "casa",
            ],
            nao_relacionada: "cobertor",
        },
        camisola: {
            tip: "Camisola",
            relacionadas: [
                "roupa",
                "algodão",
                "estampa",
                "manga",
                "gola",
                "cor",
                "tamanho",
                "vestir",
                "blusa",
            ],
            nao_relacionada: "cadeado",
        },
        carro: {
            tip: "Carro",
            relacionadas: [
                "rodas",
                "volante",
                "buzina",
                "estrada",
                "gasolina",
                "janela",
                "espelho",
                "motor",
                "acelerar",
            ],
            nao_relacionada: "livro",
        },
        castelo: {
            tip: "Castelo",
            relacionadas: [
                "princesa",
                "rei",
                "muralha",
                "torre",
                "dragão",
                "ponte levadiça",
                "cavaleiro",
                "escudo",
                "bandeira",
            ],
            nao_relacionada: "chaveiro",
        },
    };
    const [naoRelacionada, setNaoRelacionada] = useState("");
    const [array, setArray] = useState([]);
    const [tip, setTip] = useState("");
    const randomize = () => {
        const { relacionadas, nao_relacionada, tip } = _.sample(words);
        relacionadas.push(nao_relacionada);
        setNaoRelacionada(nao_relacionada);

        setArray(_.shuffle(relacionadas));
        setTip(tip);

        let buttons = document.querySelector("#buttons");
        if (buttons) {
            let children = buttons.childNodes;
            children.forEach((item) => (item.classList = "btn btn-ghost"));
        }
    };

    const checkItem = async (e) => {
        const target = e.target;

        if (target.innerHTML === naoRelacionada) {
            target.classList.toggle("btn-ghost");
            target.classList.toggle("btn-success");
            await delay(() => {
                randomize();
            }, 2000);
        }
    };

    useEffect(() => {
        randomize();
    }, []);
    return (
        <Guest>
            <div className="m-24">
                <h1 className="text-lg mt-9">
                    Qual é a palavra que não está relacionada?
                </h1>
                <h1 className="text-2xl">{tip}</h1>
                <div className="flex mt-9" id="buttons">
                    {array.map((item, i) => (
                        <button
                            key={i + "-" + item}
                            className="btn btn-ghost"
                            onClick={checkItem}
                        >
                            {item}
                        </button>
                    ))}
                </div>
            </div>
        </Guest>
    );
};

export default Wrongword;
