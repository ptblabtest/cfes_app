import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, usePage } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import FormCard from "@/Components/Form/FormCard";
import SectionFormCard from "@/Components/Form/SectionFormCard";

const Form = ({ entity, item, fields, sections, title }) => {
    const { auth } = usePage().props;

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={title} />
            <HeaderTitle
                title={"Form " + title}
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
