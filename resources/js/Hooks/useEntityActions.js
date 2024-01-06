const useEntityActions = (entity, handleDeleteClick) => {
    const actions = {
        create: {
            label: 'Create',
            href: `/${entity}/create`,
        },
        import: {
            label: 'Import',
            action: () => {
                {onImportClick}
            },
        },
        export: {
            label: 'Export',
            href: `/${entity}/export`,
        },
        show: (id) => ({
            label: 'Show',
            href: `/${entity}/show/${id}`,
        }),
        edit: (id) => ({
            label: 'Edit',
            href: `/${entity}/edit/${id}`,
        }),
        delete: (id) => ({
            label: 'Delete',
            action: () => handleDeleteClick(id),
        }),
    };

    const dropdownMenuItems = (id) => [actions.show(id), actions.edit(id), actions.delete(id)];

    return { ...actions, dropdownMenuItems };
};

export default useEntityActions;
