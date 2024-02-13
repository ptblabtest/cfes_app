import { usePage } from "@inertiajs/react";

export function useRoles() {
    const { auth } = usePage().props;
    
    const isAdmin = () => {
        return auth.user && Array.isArray(auth.user.roles) && auth.user.roles.some((role) => role.name === "admin");
    };

    const isGuest = () => {
        return auth.user && Array.isArray(auth.user.roles) && auth.user.roles.some(role => role.name === 'guest');
    };

    const isUser = () => {
        return auth.user && Array.isArray(auth.user.roles) && auth.user.roles.some(role => role.name === 'user');
    };

    return { isAdmin, isGuest, isUser };
}