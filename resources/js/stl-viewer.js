// resources/js/lib/stl-viewer.js
import * as THREE from 'three';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';
import { STLLoader } from 'three/examples/jsm/loaders/STLLoader.js';

export function initStlViewer(container, url) {
  const el = typeof container === 'string' ? document.querySelector(container) : container;
  if (!el) throw new Error('initStlViewer: contenedor no encontrado');

  // Renderer
  const renderer = new THREE.WebGLRenderer({ antialias: true });
  renderer.setPixelRatio(window.devicePixelRatio);
  el.appendChild(renderer.domElement);

  // Escena + cámara + controles
  const scene = new THREE.Scene();
  scene.background = new THREE.Color(0x1a1a1a);

  const camera = new THREE.PerspectiveCamera(60, 1, 0.1, 1000);
  camera.position.set(120, 90, 120);

  const controls = new OrbitControls(camera, renderer.domElement);
  controls.enableDamping = true;

  // Luces
  scene.add(new THREE.AmbientLight(0xffffff, 0.8));
  const dir = new THREE.DirectionalLight(0xffffff, 0.9);
  dir.position.set(80, 120, 100);
  scene.add(dir);

  // Resize
  const resize = () => {
    const w = el.clientWidth || 600;
    const h = el.clientHeight || 400;
    renderer.setSize(w, h, false);
    camera.aspect = w / h;
    camera.updateProjectionMatrix();
  };
  resize();
  window.addEventListener('resize', resize);

  // Carga STL
  const loader = new STLLoader();
  loader.load(url, (geometry) => {
    geometry.computeVertexNormals();

    const mesh = new THREE.Mesh(
      geometry,
      new THREE.MeshStandardMaterial({ color: 0x88ccff, metalness: 0.1, roughness: 0.5 })
    );
    scene.add(mesh);

    // Centrar el modelo en el origen
    const box = new THREE.Box3().setFromObject(mesh);
    const center = box.getCenter(new THREE.Vector3());
    mesh.position.sub(center);

    // Opcional: corregir orientación o unidades
    // mesh.rotation.x = -Math.PI / 2;  // si aparece “de lado”
    // mesh.scale.setScalar(0.001);     // mm → m

    fitCameraToObject(camera, mesh, controls);
    animate();
  }, undefined, (err) => {
    // eslint-disable-next-line no-console
    console.error('Error cargando STL:', err);
  });

  function fitCameraToObject(camera, object, controls, offset = 1.25) {
    const box = new THREE.Box3().setFromObject(object);
    const size = box.getSize(new THREE.Vector3());
    const maxDim = Math.max(size.x, size.y, size.z);
    const fov = camera.fov * (Math.PI / 180);
    let camZ = (maxDim / 2) / Math.tan(fov / 2) * offset;

    camera.position.set(camZ, camZ * 0.75, camZ);
    camera.near = maxDim / 100;
    camera.far  = maxDim * 100;
    camera.updateProjectionMatrix();

    controls.target.set(0, 0, 0);
    controls.update();
  }

  let raf;
  function animate() {
    controls.update();
    renderer.render(scene, camera);
    raf = requestAnimationFrame(animate);
  }

  // API de limpieza (útil si lo montas en un modal o SPA)
  return {
    dispose() {
      cancelAnimationFrame(raf);
      window.removeEventListener('resize', resize);
      renderer.dispose();
      if (renderer.domElement.parentNode) {
        renderer.domElement.parentNode.removeChild(renderer.domElement);
      }
    }
  };
}
