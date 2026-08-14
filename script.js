const STORAGE_KEY = "blocks";
const BLOCK_LIFETIME = 3000;

function addBlock(text) {
  const column = document.getElementById("column");
  const id = Date.now();
  const createdAt = Date.now();

  const block = document.createElement("div");
  block.className = "sms";
  block.textContent = text;
  block.dataset.id = id;
  block.dataset.createdAt = createdAt;

  column.appendChild(block);

  saveBlock(id, text, createdAt);
  scheduleRemoval(block, id);
}

function scheduleRemoval(block, id) {
  setTimeout(() => {
    if (block.parentNode) {
      block.classList.add("fading");
      setTimeout(() => {
        if (block.parentNode) {
          block.remove();
          removeBlock(id);
        }
      }, 500);
    }
  }, BLOCK_LIFETIME);
}

function saveBlock(id, text, createdAt) {
  const saved = JSON.parse(localStorage.getItem(STORAGE_KEY) || "[]");
  saved.push({ id, text, createdAt });
  localStorage.setItem(STORAGE_KEY, JSON.stringify(saved));
}

function removeBlock(id) {
  const saved = JSON.parse(localStorage.getItem(STORAGE_KEY) || "[]");
  const filtered = saved.filter((b) => b.id != id);
  localStorage.setItem(STORAGE_KEY, JSON.stringify(filtered));
}

function loadBlocks() {
  const saved = JSON.parse(localStorage.getItem(STORAGE_KEY) || "[]");
  const column = document.getElementById("column");
  const now = Date.now();

  saved.forEach((data) => {
    const age = now - data.createdAt;

    if (age < BLOCK_LIFETIME) {
      const block = document.createElement("div");
      block.className = "sms";
      block.textContent = data.text;
      block.dataset.id = data.id;
      block.dataset.createdAt = data.createdAt;
      column.appendChild(block);

      const remainingTime = BLOCK_LIFETIME - age;
      setTimeout(() => {
        if (block.parentNode) {
          block.classList.add("fading");
          setTimeout(() => {
            if (block.parentNode) {
              block.remove();
              removeBlock(data.id);
            }
          }, 500);
        }
      }, remainingTime);
    } else {
      removeBlock(data.id);
    }
  });
}

loadBlocks();

const lmenu = document.getElementById("lmenu");
function openl() {
  lmenu.classList.toggle("moved");
}

function opensetr() {
  const setrankmen = document.getElementById("setrankmen");
  setrankmen.style.display = "flex";
  setTimeout(() => {
    setrankmen.style.opacity = "1";
  }, 100);
}

function showster() {
  const sterror = document.getElementById("sterror");
  sterror.style.display = "block";
}

function clsetr() {
  const setrankmen = document.getElementById("setrankmen");
  setrankmen.style.opacity = "0";
  setTimeout(() => {
    setrankmen.style.display = "none";
  }, 200);
}

