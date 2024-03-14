import React, { useEffect, useRef, useState } from 'react';
import 'ol/ol.css';
import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import { fromLonLat } from 'ol/proj';
import VectorLayer from 'ol/layer/Vector';
import VectorSource from 'ol/source/Vector';
import Point from 'ol/geom/Point';
import Feature from 'ol/Feature';
import { Style, Fill, Stroke, Circle as CircleStyle } from 'ol/style';
import ItemDetailsModal from './Modal/ItemDetailsModal';

const Maps = ({ items, fields }) => {
    const mapRef = useRef();
    const [selectedItem, setSelectedItem] = useState(null);
    const [isModalOpen, setIsModalOpen] = useState(false);

    useEffect(() => {
        const map = new Map({
            target: mapRef.current,
            layers: [
                new TileLayer({
                    source: new OSM(),
                }),
            ],
            view: new View({
                center: fromLonLat([113.9213, -0.7893]), // Default center, adjust as needed
                zoom: 5,
            }),
        });

        const vectorSource = new VectorSource();
        const vectorLayer = new VectorLayer({
            source: vectorSource,
            style: new Style({
                image: new CircleStyle({
                    radius: 10,
                    fill: new Fill({ color: 'red' }),
                    stroke: new Stroke({ color: 'white', width: 2 }),
                }),
            }),
        });

        map.addLayer(vectorLayer);

        // Add a marker for each item
        items.forEach(item => {
            const longitude = parseFloat(item.longitude);
            const latitude = parseFloat(item.latitude);

            if (!isNaN(longitude) && !isNaN(latitude)) {
                const point = new Feature({
                    geometry: new Point(fromLonLat([longitude, latitude])),
                    item: item,
                });

                vectorSource.addFeature(point);
            }
        });

        map.on('singleclick', function (evt) {
            map.forEachFeatureAtPixel(evt.pixel, function (feature) {
                setSelectedItem(feature.get('item'));
                setIsModalOpen(true);
                map.getView().animate({ zoom: 10, center: feature.getGeometry().getCoordinates() });
            });
        });

        map.on('pointermove', function(e) {
            const pixel = map.getEventPixel(e.originalEvent);
            const hit = map.hasFeatureAtPixel(pixel);
            map.getTargetElement().style.cursor = hit ? 'pointer' : '';
        });

        return () => map.setTarget(undefined);
    }, [items]);

    return (
        <div className="relative h-full w-full">
            <div ref={mapRef} className="absolute top-0 left-0 right-0 bottom-0" />
            {isModalOpen && selectedItem && (
                <ItemDetailsModal
                    item={selectedItem}
                    fields={fields}
                    isOpen={isModalOpen}
                    onClose={() => setIsModalOpen(false)}
                />
            )}
        </div>
    );
};

export default Maps;
