import { BellIcon } from "@heroicons/react/24/outline";
import React, { useState } from "react";

const Notifications = ({ notifications }) => {
    const [isOpen, setIsOpen] = useState(false);

    return (
        <div className="relative">
            <button onClick={() => setIsOpen(!isOpen)} className="relative">
                <BellIcon className="h-6 w-6 text-gray-500" />
                {notifications && notifications.length > 0 && (
                    <span className="absolute top-0 right-0 inline-flex items-center justify-center p-1 bg-red-500 text-white rounded-full text-xs">
                        {notifications.length}
                    </span>
                )}
            </button>
            {isOpen && (
                <div className="absolute right-0 mt-2 w-80 bg-white shadow-xl z-50 rounded-md">
                    <div className="py-2">
                        {notifications && notifications.length > 0 ? notifications.map((notification, index) => (
                            <a
                                key={index}
                                href="#"
                                className="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                onClick={(e) => {
                                    e.preventDefault();
                                    // Handle click
                                }}
                            >
                                {notification.message}
                            </a>
                        )) : (
                            <div className="px-4 py-2 text-sm text-gray-700">No notifications</div>
                        )}
                    </div>
                </div>
            )}
        </div>
    );
};

export default Notifications;
