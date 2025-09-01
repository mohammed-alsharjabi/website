// server.js
import express from "express";
import fetch from "node-fetch";

const app = express();
app.use(express.json());

// غيّرها إلى دومينك
const ALLOW_ORIGIN = "https://www.technovizen.com";

app.use((req,res,next)=>{
  const o = req.headers.origin;
  if (o === ALLOW_ORIGIN) res.setHeader("Access-Control-Allow-Origin", o);
  res.setHeader("Access-Control-Allow-Methods", "POST, OPTIONS");
  res.setHeader("Access-Control-Allow-Headers", "Content-Type, Authorization");
  if (req.method === "OPTIONS") return res.sendStatus(204);
  next();
});

app.post("/api/ai", async (req,res)=>{
  try{
    const messagesIn = Array.isArray(req.body?.messages) ? req.body.messages.slice(-12) : [];
    const system = {
      role:"system",
      content:"You are Technovizen's web assistant. Primary: Arabic. Be concise, helpful, and collect lead info when relevant."
    };
    const payload = {
      model: "gpt-4o-mini",
      temperature: 0.3,
      max_tokens: 500,
      messages: [system, ...messagesIn]
    };
    const r = await fetch("https://api.openai.com/v1/chat/completions",{
      method:"POST",
      headers:{
        "Content-Type":"application/json",
        "Authorization":"Bearer " + process.env.OPENAI_API_KEY
      },
      body: JSON.stringify(payload),
      timeout: 25000
    });
    const data = await r.json();
    if(!r.ok) return res.status(500).json({error: data?.error?.message || "OpenAI error"});
    const reply = data?.choices?.[0]?.message?.content || "عذرًا، لم أفهم طلبك.";
    res.json({reply});
  }catch(e){
    res.status(502).json({error: e?.message || "Upstream failure"});
  }
});

app.listen(process.env.PORT || 3000, ()=> console.log("AI server running"));
