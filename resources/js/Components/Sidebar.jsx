import React, { useState, Fragment } from "react";
import { Dialog, Transition } from "@headlessui/react";
import { XMarkIcon, Bars3Icon } from "@heroicons/react/24/outline";
import sidebarConfig from "@/Config/sidebarConfig";

function Sidebar() {
    const [open, setOpen] = useState(false);

    return (
        <div className="bg-white">
            {/* Mobile menu */}
            <Transition.Root show={open} as={Fragment}>
                <Dialog as="div" className="relative z-40" onClose={setOpen}>
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
                                {/* Close Button */}
                                <button
                                    type="button"
                                    className="-m-2 inline-flex items-center justify-center rounded-md p-2"
                                    onClick={() => setOpen(false)}
                                >
                                    <XMarkIcon className="h-6 w-6" aria-hidden="true" />
                                </button>
                            </div>

                            {/* Category Links */}
                            <div className="flex-grow overflow-y-auto px-4 py-6">
                                {sidebarConfig.map((category) => (
                                    <div key={category.title} className="mb-3">
                                        <h3 className="text-lg font-medium">{category.title}</h3>
                                        <ul className="mt-2 space-y-1">
                                            {category.items.map((item) => (
                                                <li key={item.name}>
                                                    <a
                                                        href={item.route}
                                                        className="block p-2 text-base text-gray-900 hover:bg-gray-50"
                                                    >
                                                        {item.name}
                                                    </a>
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                ))}
                            </div>
                        </Dialog.Panel>
                    </Transition.Child>
                </Dialog>
            </Transition.Root>

            {/* Open Sidebar Button (for mobile) */}
            <button
                type="button"
                className="p-2"
                onClick={() => setOpen(true)}
            >
                <Bars3Icon className="h-6 w-6" aria-hidden="true" />
            </button>
        </div>
    );
}

export default Sidebar;
