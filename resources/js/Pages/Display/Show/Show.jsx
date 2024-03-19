import React, { useState, useEffect } from "react";
import axios from "axios";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import Cards from "@/Components/Card/Cards";
import RelatedCards from "@/Components/Card/RelatedCards";

const Show = ({ auth }) => {
    const [data, setData] = useState({
        item: {},
        title: '',
        entity: '',
        model: '',
        relation_show: null,
        cards: { fields: {} },
    });
    const [activeTab, setActiveTab] = useState(0);

    useEffect(() => {
        const pathSegments = window.location.pathname.split('/');
        const entity = pathSegments[1];
        const id = pathSegments[3];

        axios.get(`/api/${entity}/show/${id}`)
            .then(response => {
                setData({
                    item: response.data.item,
                    title: response.data.config.title,
                    entity: entity,
                    model: response.data.config.model,
                    relation_show: response.data.config.relation_show,
                    cards: response.data.config.cards,
                });
            })
            .catch(error => {
                console.error("There was an error fetching the item details:", error);
            });
    }, []);

    const relationKeys = data.relation_show ? Object.keys(data.relation_show) : [];

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={data.title} />
            <HeaderTitle
                title={`Lihat ${data.title}`}
                breadcrumbs={[
                    { name: "Home", url: "/dashboard" },
                    { name: data.title, url: `/${data.entity}` },
                    { name: `Lihat ${data.title}`, url: "" },
                ]}
            />
            <div className="mx-auto py-2">
                <div className="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                        <Cards
                            model={data.model}
                            item={data.item}
                            fields={data.cards.fields}
                            title={data.title}
                            entity={data.entity}
                        />
                    </div>
                </div>
            </div>

            {data.relation_show && (
                <div className="mx-auto">
                    <div className="max-w-5xl mx-auto sm:px-6 lg:px-8">
                        <div className="flex border-b w-full bg-white overflow-hidden shadow-sm rounded-lg mb-2">
                            {relationKeys.map((key, index) => (
                                <div
                                    key={key}
                                    className={`flex-grow cursor-pointer py-1 text-center text-md ${activeTab === index ? "border-b-2 border-blue-500 font-medium" : "text-gray-500 hover:text-gray-700"}`}
                                    onClick={() => setActiveTab(index)}
                                    style={{ flexBasis: 0 }}
                                >
                                    {data.relation_show[key].title}
                                </div>
                            ))}
                        </div>

                        {relationKeys.map((key, index) => (
                            <div
                                key={key}
                                style={{ display: index === activeTab ? "block" : "none" }}
                            >
                                <RelatedCards
                                    item={data.item}
                                    relation_show={{ [key]: data.relation_show[key] }}
                                    auth={auth.user}
                                />
                            </div>
                        ))}
                    </div>
                </div>
            )}
        </AuthenticatedLayout>
    );
};

export default Show;
