import React, { useState, Fragment, useEffect } from "react";
import { Dialog, Transition } from "@headlessui/react";
import {
    XMarkIcon,
    Bars3Icon,
    ChevronDownIcon,
} from "@heroicons/react/24/outline";
import sidebarConfig from "@/Config/sidebarConfig";
import { usePage } from "@inertiajs/react";

function Sidebar() {
    const [open, setOpen] = useState(false);
    const { url } = usePage();

    const [activeCategory, setActiveCategory] = useState(null);

    // Determine which category should be open based on the current URL
    useEffect(() => {
        const currentCategory = sidebarConfig.find(category =>
            category.items.some(item => url === item.route)
        );
        setActiveCategory(currentCategory ? currentCategory.title : null);
    }, [url]);

    return (
        <div className="bg-teal-50">
            <Transition.Root show={open} as={Fragment}>
                <Dialog as="div" className="relative z-50" onClose={setOpen}>
                    <div className="fixed inset-0 bg-black bg-opacity-25" />

                    <Transition.Child
                        as={Fragment}
                        enter="transition ease-in-out duration-300 transform"
                        enterFrom="-translate-x-full"
                        enterTo="translate-x-0"
                        leave="transition ease-in-out duration-300 transform"
                        leaveFrom="translate-x-0"
                        leaveTo="-translate-x-full"
                    >
                        <Dialog.Panel className="fixed inset-0 z-40 flex w-full max-w-xs flex-col bg-white shadow-xl">
                            <div className="flex items-center justify-between px-4 pt-5 pb-2">
                                <button
                                    type="button"
                                    className="-m-2 inline-flex items-center justify-center rounded-md p-2"
                                    onClick={() => setOpen(false)}
                                >
                                    <XMarkIcon
                                        className="h-6 w-6"
                                        aria-hidden="true"
                                    />
                                </button>
                            </div>
                            <div className="flex-grow overflow-y-auto px-4 py-6">
                {sidebarConfig.map((category) => (
                    <details key={category.title} className="mb-3" open={activeCategory === category.title}>
                        <summary className="flex justify-between items-center text-lg font-medium cursor-pointer">
                            {category.title}
                            <ChevronDownIcon className="h-5 w-5" />
                        </summary>
                        <ul className="mt-2 space-y-1 pl-4">
                            {category.items.map((item) => (
                                <li key={item.name}>
                                    <a
                                        href={item.route}
                                        className={`block p-2 text-base hover:bg-gray-50 ${
                                            url === item.route ? "font-bold" : "text-gray-900"
                                        }`}
                                    >
                                        {item.name}
                                    </a>
                                </li>
                            ))}
                        </ul>
                    </details>
                ))}
            </div>
                        </Dialog.Panel>
                    </Transition.Child>
                </Dialog>
            </Transition.Root>

            <button type="button" className="p-2" onClick={() => setOpen(true)}>
                <Bars3Icon className="h-6 w-6" aria-hidden="true" />
            </button>
        </div>
    );
}

export default Sidebar;
