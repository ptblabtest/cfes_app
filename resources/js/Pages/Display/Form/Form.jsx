import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import FormCard from "@/Components/Form/FormCard";
import SectionFormCard from "@/Components/Form/SectionFormCard";

const Form = ({ entity, item, fields, sections, title, auth }) => {

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={title} />
            <HeaderTitle
                title={`${item ? "Edit" : "Tambah"} ${title}`}
                breadcrumbs={[
                    { name: "Home", url: "/dashboard" },
                    { name: title, url: `/${entity}` },
                    { name: item ? `Edit ${title}` : `Tambah ${title}` },
                ]}
            />
            <div className="mx-auto py-2">
                <div className="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="px-4 py-5">
                            {fields ? (
                                <FormCard
                                    item={item}
                                    entity={entity}
                                    fields={fields}
                                    title={title}
                                />
                            ) : (
                                <SectionFormCard
                                    item={item}
                                    entity={entity}
                                    sections={sections}
                                    title={title}
                                />
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default Form;
