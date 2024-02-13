import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import Cards from "@/Components/Content/Cards";
import RelatedCards from "@/Components/Content/RelatedCards";

const Show = ({ item, title, auth, cards, entity, relation_show = null, editUrl }) => {
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
                        <div className="md:flex">
                            <Cards
                                item={item}
                                fields={cards.fields}
                                entity={entity}
                                editUrl={editUrl}
                            />
                        </div>
                    </div>
                </div>
            </div>
            {relation_show && (
                <RelatedCards
                    item={item}
                    relation_show={relation_show}
                    auth={auth.user}
                />
            )}
        </AuthenticatedLayout>
    );
};

export default Show;
