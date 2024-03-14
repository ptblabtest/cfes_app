import React, { useState } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import Cards from "@/Components/Card/Cards";
import RelatedCards from "@/Components/Card/RelatedCards";

const Show = ({
    item,
    title,
    auth,
    cards,
    entity,
    model,
    relation_show = null,
}) => {
    const [activeTab, setActiveTab] = useState(0);
    const relationKeys = relation_show ? Object.keys(relation_show) : [];

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={title} />
            <HeaderTitle
                title={`Lihat ${title}`}
                breadcrumbs={[
                    { name: "Home", url: "/dashboard" },
                    { name: title, url: `/${entity}` },
                    { name: `Lihat ${title}`, url: "" },
                ]}
            />
            <div className="mx-auto py-2">
                <div className="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                        <Cards
                            model={model}
                            item={item}
                            fields={cards.fields}
                            title={title}
                            entity={entity}
                        />
                    </div>
                </div>
            </div>

            {relation_show && (
                <div className="mx-auto">
                    <div className="max-w-5xl mx-auto sm:px-6 lg:px-8">
                        <div className="flex border-b w-full bg-white overflow-hidden shadow-sm rounded-lg mb-2">
                            {relationKeys.map((key, index) => (
                                <div
                                    key={key}
                                    className={`flex-grow cursor-pointer py-1 text-center text-md ${
                                        activeTab === index
                                            ? "border-b-2 border-blue-500 font-medium"
                                            : "text-gray-500 hover:text-gray-700"
                                    }`}
                                    onClick={() => setActiveTab(index)}
                                    style={{ flexBasis: 0 }}
                                >
                                    {relation_show[key].title}
                                </div>
                            ))}
                        </div>

                        {relationKeys.map((key, index) => (
                            <div
                                key={key}
                                style={{
                                    display:
                                        index === activeTab ? "block" : "none",
                                }}
                            >
                                <RelatedCards
                                    item={item}
                                    relation_show={{
                                        [key]: relation_show[key],
                                    }}
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
